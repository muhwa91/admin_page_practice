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
        $monthlyRegisterUserData = User::select(
                                DB::raw('MONTH(created_at) as month'), 
                                DB::raw('COUNT(*) as user_count'))
                            ->groupBy(DB::raw('MONTH(created_at)'))
                            ->orderBy(DB::raw('MONTH(created_at)'))
                            ->get();        
                    
        return response()->json([
            'code' => 'bd00',
            'monthlyRegisterUserData' => $monthlyRegisterUserData,
        ], 200);
    }
}