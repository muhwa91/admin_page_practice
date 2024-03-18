<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ManagementController extends Controller
{
    public function userList() {        
        $userAllList = User::select(
                    'user_email', 
                    'user_name', 
                    DB::raw("DATE_FORMAT(created_at, '%Y%m%d') as user_created"),
                    DB::raw("CASE WHEN deleted_at IS NULL THEN 'N' ELSE 'Y' END AS user_deleted")
                )
                ->orderByDesc('user_created')
                ->get();
        
        $errorMsg = "오류가 발생했습니다. 페이지를 새로고침 해주세요";
        Log::debug($userAllList);
        return response()->json([
            'code' => 'ul00',
            'data' => $userAllList,
            'error' => $errorMsg
        ], 200);
    }

    public function adminList() {        
        $adminAllList = Admin::select('admin_number', 
                        'admin_name',
                        'admin_flg',
                        DB::raw("DATE_FORMAT(created_at, '%Y%m%d') as admin_created"),
                        DB::raw("CASE WHEN deleted_at IS NULL THEN 'N' ELSE 'Y' END AS admin_deleted")
                    )
                    ->orderByDesc('admin_created')
                    ->get();
        
        $errorMsg = "오류가 발생했습니다. 페이지를 새로고침 해주세요";
        Log::debug($adminAllList);
        return response()->json([
            'code' => 'al00',
            'data' => $adminAllList,
            'error' => $errorMsg
        ], 200);
    }
}
