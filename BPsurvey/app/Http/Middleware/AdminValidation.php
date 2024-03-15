<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        // Admin 유효성 검사
        Log::debug("### Admin 유효성 검사 시작 ###");

        // 회원가입, 로그인 시도 요청 확인
        $isAdminRequest = $request->isMethod('post') && $request->route()->getName() == 'adminPostRegister';

        // Admin 유효성 검사 목록 : 회원가입
        $adminRegisterValidation = [
            'admin_number' => [
				'required', 
				'regex:/^\d{1,10}$/', 
				'unique:Admin,admin_number'
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

        // Admin 유효성 검사 목록 : 로그인
		$adminLoginValidation = [
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

        // 유효성 검사 선택
        $adminValidation = $isAdminRequest ? $adminRegisterValidation : $adminLoginValidation;

		// 유효성 검사 수행
        $adminValidator = Validator::make($request->all(), $adminValidation);

		// 유효성 검사 결과 리턴
        if ($adminValidator->passes()) {
            // 유효성 검사 통과 시 로그 남기기
            $logMsg = $isAdminRequest ? "회원가입" : "로그인";
            Log::debug("### Admin 유효성 검사 성공: $logMsg ###");
        } else {
            $errorMsg = $isAdminRequest ? "회원가입" : "로그인";
            Log::debug("### Admin 유효성 검사 실패: $errorMsg ###");
            return response()->json([
                'code' => $isAdminRequest ? 'val01' : 'val02',
                'error' => $errorMsg,
                'errors' => $adminValidator->errors(),
            ], 422);
        }

        return $next($request);
    }
}
