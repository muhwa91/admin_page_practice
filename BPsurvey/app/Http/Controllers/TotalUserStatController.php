<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Survey_responses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class TotalUserStatController extends Controller
{
    public function totalUserStat() 
    {           
        // 총 가입유저 수(탈퇴 유저 제외)
        $totalRegisterUser = User::whereNull('deleted_at')
                            ->count();
        // 금일 가입유저 수(금일 탈퇴 유저 제외)
        $totalTodayRegisterUser = User::where('created_at','>=', now())
                                ->count();
        // 만족도 조사 참여유저 수
        $totalSurveyResponseUser = Survey_responses::where('survey_response_id')
                    ->count();     
        
        Log::debug("### 총 가입유저 수 : " . $totalRegisterUser . " ###");
        Log::debug("### 금일 가입유저 수 : " . $totalTodayRegisterUser . " ###");
        Log::debug("### 만족도 조사 참여유저 수 : " . $totalSurveyResponseUser . " ###");
                    
        return response()->json([
            'code' => 'ts00',
            'totalRegisterUser' => $totalRegisterUser,
            'totalTodayRegisterUser' => $totalTodayRegisterUser,
            'totalSurveyResponseUser' => $totalSurveyResponseUser
        ], 200);
    }
}
