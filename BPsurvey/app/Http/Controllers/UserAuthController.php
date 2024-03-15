<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserAuthController extends Controller
{
    public function userLogin(Request $request) 
    {
        // 로그인 시도 처리
        $loginUser = User::where('user_email', $request->user_email)->first();
        // User모델 내 email에서 요청보낸 email로 검색된 결과 중 첫번째 레코드 반환

        if( !$loginUser || !(Hash::check( $request->user_password, $loginUser->user_password))) {
            $errorMsg = '이메일 주소와 비밀번호를 다시 확인해주세요';
            Log::debug("### 로그인 요청 확인 : 이메일 또는 비밀번호 불일치 ###");
                return response()->json([
                    'code' => 'ul01',
                    'error' => $errorMsg
                ], 400);
        }

        Auth::login($loginUser);

        if(Auth::check()) {
            // 세션 내 user_id 데이터 저장
            session($loginUser->only('user_id'));
            Log::debug("### 로그인 요청 확인 : 로그인 처리완료 ###");
                return response()->json([
                    'code' => 'ul00',
                    'data' => $loginUser
                ], 200);
        } else {
            $errorMsg = '오류가 발생했습니다. 페이지를 새로고침 후 재 로그인해주세요';
            Log::debug("### 로그인 요청 확인 :  ###");
                return response()->json([
                    'code' => 'ul02',
                    'error' => $errorMsg
                ], 400);
        }
    }
}
