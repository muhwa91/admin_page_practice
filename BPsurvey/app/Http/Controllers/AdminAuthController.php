<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminAuthController extends Controller
{
    // ### Admin 로그인 ###
	public function adminLogin(Request $request) 
    {   
        // 로그인 시도 처리
        // Admin모델 내 로그인에서 요청보낸 admin_number로 검색된 결과 중 첫번째 레코드 반환
        $loginAdmin = Admin::where('admin_number', $request->admin_number)->first();

    	// 로그인 실패 처리
        if(!$loginAdmin || !(Hash::check($request->admin_password, $loginAdmin->admin_password))) {
            $errorMsg = "아이디와 비밀번호를 다시 확인해주세요";
            Log::debug("### Admin 로그인 요청 확인 : 아이디 또는 비밀번호 불일치 ###");
            return response()->json([
                'code' => 'al01',
                'error' => $errorMsg
            ], 400);
        }

        // Admin_flg 저장
        $adminFlg = $loginAdmin->admin_flg;  

        // 로그인 실패 및 성공 처리
        if($adminFlg === '0') {
            $errorMsg = "승인되지 않은 계정입니다";
            Log::debug("### Admin 로그인 요청 확인 : AdminFlg $adminFlg / 승인되지 않은 계정 ###");
            return response()->json([
                'code' => 'al02',
                'error' => $errorMsg
            ], 400);
        } else if($adminFlg == '1' || $adminFlg == '2') {
            // rootAdmin 또는 subAdmin 로그인 처리
            Auth::login($loginAdmin);
            session($loginAdmin->only('admin_id'));
            Log::debug("### Admin 로그인 요청 확인 : AdminFlg $adminFlg / " . ($adminFlg == '1' ? 'rootAdmin' : 'subAdmin') . " 로그인 처리완료 ###");
            return response()->json([
                'code' => 'al00',
                'data' => $loginAdmin
            ], 200);

        } else {
            $errorMsg = "오류가 발생했습니다. 페이지를 새로고침 후 재 로그인해주세요";
            Log::debug("### Admin 로그인 요청 확인 : 예외처리 ###");
            return response()->json([
                'code' => 'al03',
                'error' => $errorMsg
            ], 400);
        }
    }
}
