<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserWithdrawalController extends Controller
{
    public function userWithdrawal(Request $request) 
    {
        try {
            DB::beginTransaction();
            Log::debug("### 트랜잭션 시작 ###");

            // User삭제 요청 User 정보 저장
            $requestUserInfo = $request
            ->only(
                'user_email',
            );

            // User삭제 요청 User정보 조회
            $confirmUserInfo = User::where('user_email', $requestUserInfo['user_email'])->first();
            
            if ($confirmUserInfo) {
                $confirmUserInfo->delete();
                Log::debug("### User 계정삭제 : 삭제완료 ###");
                DB::commit();
                Log::debug("### 커밋 완료 ###");
                return response()->json([
                    'code' => 'uw00',
                    'data' => $confirmUserInfo
                ], 200);
            }
            
        } catch (Exception $e) {
            $errorMsg = '오류가 발생했습니다. 페이지를 새로고침 후 다시 시도해주세요.';
            DB::rollback();
            Log::debug("### User 계정삭제 : 롤백 완료 ###");
            Log::debug("### 예외발생 : 롤백완료 ###" . $e->getMessage());
            return response()->json([
                'code' => 'uw01', 
                'error' => $errorMsg
            ], 400);
        } 
    } 
}
