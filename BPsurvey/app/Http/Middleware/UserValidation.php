<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class UserValidation
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
        Log::debug("### User 유효성 검사 시작 ###");

        $requestData = $request->all();
        Log::debug("요청 데이터: " . json_encode($requestData));
        
         // 회원가입, 로그인 시도 요청 확인
        $isUserRegisterRequest = $request->isMethod('post') && $request->route()->getName() == 'userRegister' && $request->has('user_password_confirm');
        $isUserLoginRequest = $request->isMethod('post') && $request->route()->getName() == 'userLogin';
        // user 유효성 검사 목록 : 회원가입
        $userRegisterValidation = [
            'user_email' => [
                'required',
                'regex:/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/',
                'max:50',
                'unique:users,user_email'],
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
                'regex:/^(19|20)\d\d(0[1-9]|1[0-2])(0[1-9]|[12][0-9]|3[01])$/',
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

        // user 유효성 검사 목록 : 로그인
		$userLoginValidation = [
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

        // 유효성 검사 선택
        $userValidation = $isUserRegisterRequest ? $userRegisterValidation : $userLoginValidation;

		// 유효성 검사 수행
        $userValidator = Validator::make($request->all(), $userValidation);

        // 회원가입 또는 로그인에 대한 유효성 검사 수행 여부 확인
        $isUserRegisterValidation = $isUserRegisterRequest;

		// 유효성 검사 결과 리턴
        if ($userValidator->passes()) {
            // 유효성 검사 통과 시 로그 남기기
            $validatorMsg = $isUserRegisterValidation  ? "회원가입" : "로그인";
            Log::debug("### User 유효성 검사 성공: $validatorMsg ###");
        } else {
            $errorMsg = $isUserRegisterValidation ? "회원가입" : "로그인";

            return response()->json([
                'code' => $userValidator ? 'uv01' : 'uv02',
                'error' => $errorMsg,
                'errors' => $userValidator->errors(),
            ], 422);
        }

        return $next($request);
    }
}
