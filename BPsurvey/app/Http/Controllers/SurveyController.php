<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Survey_question;
use App\Models\Survey_option;
use App\Models\Survey_responses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SurveyController extends Controller
{   
    public function surveyListGet() {
        
        $surveyQuestionList = Survey_question::select('survey_question_title', 'survey_question_id')
                    ->get();

        Log::debug($surveyQuestionList);
        return response()->json([
            'code' => 'sg00',
            'data' => $surveyQuestionList
        ], 200);
    }

    public function surveyPost(Request $request)
    {
        try {
            // 만족도 조사 응답 결과 저장용
            $surveyResponses = [];            

            DB::beginTransaction();
            Log::debug('### 만족도 조사 응답 처리 : 트랜잭션 시작 ###');

            // 인증된 사용자의 ID를 가져옴
            $userId = Auth::user()->user_id;
            Log::debug('### 만족도 조사 응답 유저 PK: ' . $userId . '###');

            $existingResponse = Survey_responses::where('user_id', $userId)->first();

            if(!$existingResponse) {
                foreach ($request->all() as $key => $value) {
                    if (strpos($key, 'surveyAnswer_') === 0) {
                        $questionId = substr($key, strlen('surveyAnswer_'));
                        $surveyResponses[] = [
                            'survey_response_content' => $value,
                            'user_id' => $userId,
                            'survey_question_id' => $questionId,
                            'created_at' => now()
                        ];
                    }
                }

                Survey_responses::insert($surveyResponses);
                Log::debug('### 만족도 조사 응답 처리 : 삽입 처리 ###');

                DB::commit();
                Log::debug("### 만족도 조사 응답 저장 완료 ###");                
                return response()->json([
                    'code' => 'sp00'
                    ,'data' => $surveyResponses
                ], 200);
            } else {
                $errorMsg = "만족도 조사에 이미 참여하셨습니다.";
                Log::error("### 만족도 조사 응답 처리 : 중복 요청 ###");
                return response()->json([
                    'code' => 'sp01', 
                    'error' => $errorMsg
                ], 400);
            }
            
        } catch (\Exception $e) {
            DB::rollBack();
            $errorMsg = '오류가 발생했습니다. 페이지를 새로고침 후 다시 제출해주세요';
            Log::error("### 만족도 조사 응답 처리 중 오류 발생 ###: " . $e->getMessage());
            return response()->json([
                'error' => $errorMsg
            ], 500);
        }
    }

    public function questionAdd(Request $request)
    {
        try {     
            DB::beginTransaction();
            Log::debug('### 만족도 조사 질문 추가 : 트랜잭션 시작 ###');

            $addQuestion = $request
            ->only(
                'survey_question_title',
            );

            Survey_question::create($addQuestion);
            Log::debug('### 만족도 조사 질문 추가 : 삽입 처리 ###');

            DB::commit();
            Log::debug("### 만족도 조사 질문 추가 완료 ###");

            return response()->json([
                'code' => 'qa00'
                ,'data' => $addQuestion
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            $errorMsg = '오류가 발생했습니다. 페이지를 새로고침 후 다시 제출해주세요';
            Log::error("### 만족도 조사 응답 처리 중 오류 발생 ###: " . $e->getMessage());
            return response()->json([
                'error' => $errorMsg
            ], 500);
        }
    }
}
