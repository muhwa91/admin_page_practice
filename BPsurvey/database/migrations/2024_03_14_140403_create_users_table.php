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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            // 유저 PK
            // default : big_int, pk, auto_increment

            $table->string('user_email', 50)->unique();
            // 유저 이메일
            // varchar 생성(50) / default : unique, not null
            
            $table->string('user_password', 50);
            // 유저 비밀번호
            // varchar 생성(50) / default : not null            
            
            $table->string('user_name', 50);
            // 유저 이름
            // varchar 생성(50) / default : not null
            
            $table->string('user_gender', 50);
            // 유저 성별
            // varchar(50) / default : not null
            
            $table->date('user_birthdate');
            // 유저 생년월일
            // date 날짜 형식 생성 / default : not null
            
            $table->string('user_tel', 11);
            // 휴대폰 번호
            // varchar 생성(11) / default : not null
            
            $table->unsignedBigInteger('user_postcode')->length(10);
            // 우편번호
            // unsignedBigInteger 생성(10), 양수 정수 한정 / default : not null

            $table->string('user_basic_address', 200);
            // 기본주소
            // varchar 생성(200) / default : not null
            
            $table->string('user_detail_address', 200);
            // 상세주소
            // varchar 생성(200) / default : not null          
            
            $table->rememberToken();
            // 로그인 상태 유지 목적
            
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
        Schema::dropIfExists('users');
    }
};
