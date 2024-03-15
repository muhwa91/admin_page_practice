<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserRegisterController extends Controller
{
    public function userRegister(Request $request)
    {
        try {
            DB::beginTransaction();
            Log::debug("### 회원가입 : 트랜잭션 시작 ###");
            
            // 회원가입 요청 유저 정보 저장
            $requestUserInfo = $request
            ->only(
                'user_email', 
                'user_password', 
                'user_password_confirm', 
                'user_name', 
                'user_birthdate', 
                'user_gender',
                'user_carrier',
                'user_tel'
            );

            // 회원가입 요청 유저 정보 조회
            $confirmUserInfo = User::where('user_email', $requestUserInfo['user_email'])->first();

            // 이메일 중복여부 확인
            if ($confirmUserInfo) {
                $errorMsg = "이미 등록된 이메일 주소입니다.";
                Log::debug("### 회원가입 요청 확인 : 이메일 중복 ###");
                return response()->json([
                    'code' => 'ur00',
                    'error' => $errorMsg
                ], 400);
            }

            $requestUserInfo['user_password'] = Hash::make($requestUserInfo['user_password']);

            Log::debug("### 회원가입 : 비밀번호 암호화 처리완료 ###");
            $newUser = User::create($requestUserInfo);
            Log::debug("### 회원가입 : 유저 생성 ###");

            DB::commit();
            Log::debug("### 회원가입 : 트랜잭션 종료 ###");

            if($newUser) {
                Log::debug("### 회원가입 : 가입완료 ###");
                return response()->json([
                    'code' => 'ur00'
                    ,'data' => $newUser
                ], 200);
            }else {
                $errorMsg = "오류가 발생했습니다. 페이지를 새로고침 후 재 가입해주세요";
                Log::debug("### 회원가입 : 예외처리 ###");
                return response()->json([
                    'code' => 'ur02',
                    'error' => $errorMsg
                ], 400);
            }
        } catch (Exception $e) {
            $errorMsg = "오류가 발생했습니다. 페이지를 새로고침 후 재 가입해주세요";
            DB::rollBack();
            Log::error("### 회원가입 : 롤백 완료 ###");
            return response()->json([
                'code' => 'ur03', 
                'error' => $errorMsg
            ], 400);
        }
    }
}
