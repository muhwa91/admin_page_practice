<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;

class ManagementController extends Controller
{
    public function userList() {
        // 페이징 처리
        $userAllList = User::select('user_id', 'user_email', 'user_name', 'deleted_at',
                        DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') AS user_created_at"))
                        ->whereNull('deleted_at')
                        ->orderByDesc('created_at')
                        ->paginate(7);         
        
        $errorMsg = "오류가 발생했습니다. 페이지를 새로고침 해주세요";

        Log::debug($userAllList);
        return response()->json([
            'code' => 'ul00',
            'userAllList' => $userAllList,
            'error' => $errorMsg
        ], 200);
    }

    public function adminList() {        
        $adminAllList = Admin::select('admin_number', 'admin_name', 'admin_flg', 'deleted_at',
                        DB::raw("DATE_FORMAT(created_at, '%Y%m%d') as admin_created_at"))
                        ->whereNull('deleted_at')
                        ->orderByDesc('created_at')
                        ->paginate(7);          
        $errorMsg = "오류가 발생했습니다. 페이지를 새로고침 해주세요";
        Log::debug($adminAllList);
        return response()->json([
            'code' => 'al00',
            'adminAllList' => $adminAllList,
            'error' => $errorMsg
        ], 200);
    }
}
