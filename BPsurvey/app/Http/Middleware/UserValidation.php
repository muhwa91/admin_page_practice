<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class UserValidation
{
    public function handle(Request $request, Closure $next)
    {   
        Log::debug("### User 유효성 검사 시작 ###");

        $requestData = $request->all();
        Log::debug("### User 요청 데이터: " . json_encode($requestData) . "###");
        
        // 회원가입 or 로그인 요청 확인
        $isUserRegisterRequest = $request->method() === 'POST' && $request->route()->getName() == 'userRegister' && $request->has('user_password_confirm');

        Log::debug("### User 요청: " . ($isUserRegisterRequest ? "회원가입" : "로그인") . " ###");

        // 유효성 검사 선택(회원가입 or 로그인)
        $userValidation = $isUserRegisterRequest ? $this->userRegisterValidationRule() : $this->userLoginValidationRule();

        // 유효성 검사 진행
        $userValidator = Validator::make($request->all(), $userValidation);

        // 유효성 검사 결과
        if ($isUserRegisterRequest) {
            if ($userValidator->fails()) {
                return $this->userRegisterValidationFailure($userValidator);
            }
        } else {
            if ($userValidator->fails()) {
                return $this->userLoginValidationFailure($userValidator);
            }
        }

        // 유효성 검사 결과 LOG
        $userValidatorMsg = $isUserRegisterRequest ? "회원가입" : "로그인";
        Log::debug("### User 유효성 검사 성공: $userValidatorMsg ###");

        return $next($request);
    }

    // 회원가입 유효성 검사 규칙
    private function userRegisterValidationRule()
    {
        return [
            'user_email' => [
                'required',
                'regex:/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/',
                'max:50',
                'unique:users,user_email'
            ],
            'user_password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/',
                'max:20',
            ],
            'user_password_confirm' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/',
                'max:20',
                'same:user_password',
            ],
            'user_name' => [
                'required',
                'regex:/^[가-힣]{1,50}$/'
            ],
            'user_birthdate' => [
                'required',
                'regex:/^(19|20)\d\d-(0[1-9]|1[0-2])-((0[1-9])|([12][0-9])|(3[01]))$/',
                'max:11',
            ],
            'user_gender' => [
                'required',
                'in:male,female',
            ],
            'user_carrier' => [
                'required',
                'in:KT,LGU+,SKT',
            ]
        ];
    }
        
    // 로그인 유효성 검사 규칙
    private function userLoginValidationRule()
    {
        return [
            'user_email' => [
                'required',
                'regex:/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/',
            ],
            'user_password' => [
                'required',
                'string',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/',
            ],
        ];
    }

    // 회원가입에 대한 유효성 검사 실패 시 처리
    private function userRegisterValidationFailure($validator)
    {
        $errorMsg = "User 회원가입 유효성 검사 실패";
        Log::debug("### $errorMsg ###");
        return response()->json([
            'code' => 'uv01',
            'error' => $errorMsg,
            'errors' => $validator->errors(),
        ], 422);
    }

    // 로그인에 대한 유효성 검사 실패 시 처리
    private function userLoginValidationFailure($validator)
    {
        $errorMsg = "User 로그인 유효성 검사 실패";
        Log::debug("### $errorMsg ###");
        return response()->json([
            'code' => 'uv02',
            'error' => $errorMsg,
            'errors' => $validator->errors(),
        ], 422);
    }
}
