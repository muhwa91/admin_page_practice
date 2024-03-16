<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminValidation
{
    public function handle(Request $request, Closure $next)
    {   
        // /admin 접속 시 GET일 때 유효성 검사 진행 패스
        if ($request->isMethod('get')) {
            return $next($request);
        }
        
        Log::debug("### Admin 유효성 검사 시작 ###");

        $requestData = $request->all();
        Log::debug("### Admin 요청 데이터: " . json_encode($requestData) . "###");
        
        $isAdminRegisterRequest = $request->method() === 'POST' && $request->route()->getName() == 'adminRegister' && $request->has('admin_password_confirm');

        Log::debug("### Admin 요청: " . ($isAdminRegisterRequest ? "Admin 추가" : "로그인") . " ###");

        // 유효성 검사 선택(Admin 추가 or 로그인)
        $adminValidation = $isAdminRegisterRequest ? $this->adminRegisterValidationRule() : $this->adminLoginValidationRule();

        // 유효성 검사 진행
        $adminValidator = Validator::make($request->all(), $adminValidation);

        // 유효성 검사 결과
        if ($isAdminRegisterRequest) {
            if ($adminValidator->fails()) {
                return $this->adminRegisterValidationFailure($adminValidator);
            }
        } else {
            if ($adminValidator->fails()) {
                return $this->adminLoginValidationFailure($adminValidator);
            }
        }

        // 유효성 검사 결과 LOG
        $adminValidatorMsg = $isAdminRegisterRequest ? "Admin 추가" : "로그인";
        Log::debug("### Admin 유효성 검사 성공: $adminValidatorMsg ###");

        return $next($request);
    }

    // Admin 추가 유효성 검사 규칙
    private function adminRegisterValidationRule() 
    {
        return [
            'admin_number' => [
				'required', 
				'regex:/^\d{1,10}$/', 
				'unique:admins,admin_number'
			],
            'admin_password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/',
                'max:20',
            ],
            'admin_password_confirm' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/',
                'max:20',
                'same:admin_password',
            ],
            'admin_name' => [
				'required', 
				'regex:/^[\p{Hangul}]{1,5}$/u'
			],
        ];
    }

    // 로그인 유효성 검사 규칙
    private function adminLoginValidationRule() 
    {
		return [
            'admin_number' => [
				'required', 
				'regex:/^\d{1,10}$/',
			],
            'admin_password' => [
                'required',
                'string',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/',
            ],
        ];
    }

    // Admin 추가에 대한 유효성 검사 실패 시 처리
    private function adminRegisterValidationFailure($validator)
    {
        $errorMsg = "Admin 추가 유효성 검사 실패";
        Log::debug("### $errorMsg ###");
        return response()->json([
            'code' => 'av01',
            'error' => $errorMsg,
            'errors' => $validator->errors(),
        ], 422);
    }

    // 로그인에 대한 유효성 검사 실패 시 처리
    private function adminLoginValidationFailure($validator)
    {
        $errorMsg = "Admin 로그인 유효성 검사 실패";
        Log::debug("### $errorMsg ###");
        return response()->json([
            'code' => 'av02',
            'error' => $errorMsg,
            'errors' => $validator->errors(),
        ], 422);
    }
}
