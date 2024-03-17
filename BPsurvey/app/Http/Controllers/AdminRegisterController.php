<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminRegisterController extends Controller
{
    public function adminRegister(Request $request) 
    {   
        try {
            DB::beginTransaction();
            Log::debug("### Admin가입 : 트랜잭션 시작 ###");

            // Admin가입 요청 Admin 정보 저장
            $requestAdminInfo = $request
            ->only(
                'admin_flg',
                'admin_number', 
                'admin_password', 
                'admin_name',
            );

            // Admin가입 요청 Admin 정보 조회
            $confirmAdminInfo = Admin::where('admin_number', $requestAdminInfo['admin_number'])->first();

            // Admin_number 중복 여부 확인
            if ($confirmAdminInfo) {
                $errorMsg = "이미 등록된 사원번호입니다.";
                Log::debug("### Admin가입 요청 확인 : 사원번호 중복 ###");
                return response()->json([
                    'code' => 'ar01',
                    'error' => $errorMsg
                ], 400);
            }

            $requestAdminInfo['admin_password'] = Hash::make($requestAdminInfo['admin_password']);
            Log::debug("### Admin가입 : 비밀번호 암호화 처리완료 ###");

            $newAdmin = Admin::create($requestAdminInfo);
            Log::debug("### Admin가입 : Admin 생성 ###");

            DB::commit();
            Log::debug("### Admin가입 : 트랜잭션 종료 ###");

            if($newAdmin) {
                Log::debug("### Admin가입 : 가입완료 ###");
                return response()->json([
                    'code' => 'ar00'
                    ,'data' => $newAdmin
                ], 200);
            }else {
                $errorMsg = "오류가 발생했습니다. 페이지를 새로고침 후 재 가입해주세요";
                Log::debug("### Admin가입 : 예외처리 ###");
                return response()->json([
                    'code' => 'ar02',
                    'error' => $errorMsg
                ], 400);
            }
        } catch (Exception $e) {
            $errorMsg = "오류가 발생했습니다. 페이지를 새로고침 후 재 가입해주세요";
            DB::rollBack();
            Log::debug("### Admin가입 : 롤백 완료 ###");
            Log::debug("### 롤백 사유 ### " . $e->getMessage());
            return response()->json([
                'code' => 'ar03', 
                'error' => $errorMsg
            ], 400);
        }
    }
}
