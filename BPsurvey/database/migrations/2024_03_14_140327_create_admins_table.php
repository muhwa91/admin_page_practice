<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id('admin_id');
            // admin PK
            // default : big_int, pk, auto_increment

            $table->integer('admin_flg')->default(0);
            // admin 권한 플래그
            // integer 생성 / default : 0
            // 0 권한 없음, 1 서브, 2 루트

            $table->string('admin_number', 50)->unique();
            // admin number
            // varchar 생성(50) / default : unique, not null

            $table->string('admin_password', 200);
            // admin 비밀번호
            // varchar 생성(200) / default : not null            
            
            $table->string('admin_name', 50);
            // admin 이름
            // varchar 생성(50) / default : not null

            $table->timestamps();
            // created_at, updated_at 라라벨 내부 설정 값으로 자동 생성 / default : null

            $table->softDeletes();
            // deleted_at 라라벨 내부 설정 값으로 자동 생성 / default : nullable
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
