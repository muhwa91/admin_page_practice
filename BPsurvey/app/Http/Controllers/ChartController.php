<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\User;
use App\Models\Survey_responses;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{   
    // 1~12월 가입한 유저 수 barChart Data
    public function barChartData() {
        // Log::debug("### totalUserStat 함수 시작 ###");
        // Log::debug("### 총 가입유저 수 : " . $totalRegisterUser . "###");
        $loginAdmin = Admin::where('admin_number', Auth::user()->admin_id)->get();

        if($loginAdmin) {
            $monthlyRegisterUser = User::select(DB::raw('COUNT(*) as user_count'))
                            ->groupBy(DB::raw('MONTH(created_at)'))
                            ->orderBy(DB::raw('MONTH(created_at)'))
                            ->pluck('user_count')
                            ->toArray();

            $monthlyRegisterUserData = $monthlyRegisterUser->toArray();
            
            Log::debug("### 월 별 가입유저 수 : " . $monthlyRegisterUserData . "###");
                        
            return response()->json([
                'code' => 'bd00',
                'monthlyRegisterUserData' => $monthlyRegisterUserData,
            ], 200);
        } else {
            $errorMsg = "오류가 발생했습니다. 페이지를 새로고침 해주세요.";
            Log::debug("### BarChart Data : 예외처리 ###");
            return response()->json([
                'code' => 'bd01',
                'error' => $errorMsg
            ], 400);
        }
    }
}
