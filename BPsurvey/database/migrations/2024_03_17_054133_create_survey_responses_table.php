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
        Schema::create('survey_responses', function (Blueprint $table) {
            $table->id('survey_response_id');
            // 만족도 조사 응답 PK
            // default : big_int, pk, auto_increment

            $table->string('survey_response_content', 200);
            // 만족도 조사 응답 내용
            // varchar(200) / default : not null

            // 유저 FK
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                // onUpdate cascade 설정
                ->onUpdate('cascade')
                // onDelete cascade 설정  
                ->onDelete('cascade'); 

            // 만족도 조사 질문 FK
            $table->unsignedBigInteger('survey_question_id');
            $table->foreign('survey_question_id')
                ->references('survey_question_id')
                ->on('survey_questions')
                // onUpdate cascade 설정
                ->onUpdate('cascade')
                // onDelete cascade 설정  
                ->onDelete('cascade'); 

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
        Schema::dropIfExists('survey_responses');
    }
};
