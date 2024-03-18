<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminUpdateController extends Controller
{
    public function adminUpdate(Request $request) 
    {
        try {
            DB::beginTransaction();
            Log::debug("### Admin권한 변경 : 트랜잭션 시작 ###");

            // Admin권한 변경 요청 Admin 정보 저장
            $requestAdminInfo = $request
            ->only(
                'admin_number',
            );
            // Admin권한 변경 요청 Admin 정보 조회
            $confirmAdminInfo = Admin::where('admin_number',$requestAdminInfo['admin_number'])->first();

            Log::debug("### Admin권한 요청 플래그 : " . $confirmAdminInfo->admin_flg . "###");

            if ($confirmAdminInfo->admin_flg === 1) {
                $confirmAdminInfo->admin_flg = 2;
            } else if($confirmAdminInfo->admin_flg === 2) {
                $confirmAdminInfo->admin_flg = 1;
            }

            Log::debug("### Admin권한 변경 플래그 : " . $confirmAdminInfo->admin_flg . "###");
            $confirmAdminInfo->save();
            // Admin권한 저장
            
            Log::debug("### Admin권한 변경 : 변경완료 ###");
            DB::commit();
            Log::debug("### Admin권한 변경 : 트랜잭션 종료 ###");
            return response()->json([
                'code' => 'au00',
                'data' => $confirmAdminInfo
            ], 200);
        } catch(Exception $e){
            $errorMsg = "오류가 발생했습니다. 페이지를 새로고침 후 재 요청해주세요";
            DB::rollback();
            Log::debug("### Admin권한 변경 : 롤백 완료 ###");
            return response()->json([
                'code' => 'au01',
                'error' => $errorMsg
            ], 400);
        }
    }
}
