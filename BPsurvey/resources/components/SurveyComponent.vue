<template>
    <div class="border-box survey_container">
        <div class="survey_section">

            <div class="survey_top_container">
				<span class="text-3xl font-bold survey_top_title_span">BOOKPICK'</span>
				<span class="text-2xl font-bold survey_top_content_span">만족도 조사</span>
            </div>

            <div class="survey_middle_container">                
                <div class="survey_middle_survey_p_section">
                    <p class="mb-5 text-lg font-semibold survey_p">질문 1</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_1" id="survey_1_1" 
						value="option1" v-model="surveyAnswers[0]" checked>
						<span class="survey_span">보기 1</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_1" id="survey_1_2" 
						value="option2" v-model="surveyAnswers[0]">
						<span class="survey_span">보기 2</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_1" id="survey_1_3" 
						value="option3" v-model="surveyAnswers[0]">
						<span class="survey_span">보기 3</span>
					</div>
				</div>
				<div class="survey_middle_survey_p_section">
                    <p class="mb-5 text-lg font-semibold survey_p">질문 1</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_2" id="survey_2_1" 
						value="option1" v-model="surveyAnswers[1]" checked>
						<span class="survey_span">보기1</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_2" id="survey_2_2" 
						value="option2" v-model="surveyAnswers[1]">
						<span class="survey_span">보기2</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_2" id="survey_2_3" 
						value="option3" v-model="surveyAnswers[1]">
						<span class="survey_span">보기3</span>
					</div>
				</div>
				<div class="survey_middle_survey_p_section">
                    <p class="mb-5 text-lg font-semibold survey_p">질문 1</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_3" id="survey_3_1" 
						value="option1" v-model="surveyAnswers[2]" checked>
						<span class="survey_span">보기1</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_3" id="survey_3_2" 
						value="option2" v-model="surveyAnswers[2]">
						<span class="survey_span">보기2</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_3" id="survey_3_3" 
						value="option3" v-model="surveyAnswers[2]">
						<span class="survey_span">보기3</span>
					</div>
				</div>
				<div class="survey_middle_survey_p_section">
                    <p class="mb-5 text-lg font-semibold survey_p">질문 1</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_4" id="survey_4_1" 
						value="option1" v-model="surveyAnswers[3]" checked>
						<span class="survey_span">보기1</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_4" id="survey_4_2" 
						value="option2" v-model="surveyAnswers[3]">
						<span class="survey_span">보기2</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_4" id="survey_4_3" 
						value="option3" v-model="surveyAnswers[3]">
						<span class="survey_span">보기3</span>
					</div>
				</div>
				<div class="survey_middle_survey_p_section">
                    <p class="mb-5 text-lg font-semibold survey_p">질문 1</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_5" id="survey_5_1" 
						value="option1" v-model="surveyAnswers[4]" checked>
						<span class="survey_span">보기1</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_5" id="survey_5_2" 
						value="option2" v-model="surveyAnswers[4]">
						<span class="survey_span">보기2</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_5" id="survey_5_3" 
						value="option3" v-model="surveyAnswers[4]">
						<span class="survey_span">보기3</span>
					</div>
				</div>
				<div class="survey_middle_survey_p_section">
                    <p class="mb-5 text-lg font-semibold survey_p">질문 1</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_6" id="survey_6_1" 
						value="option1" v-model="surveyAnswers[5]" checked>
						<span class="survey_span">보기1</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_6" id="survey_6_2" 
						value="option2" v-model="surveyAnswers[5]">
						<span class="survey_span">보기2</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_6" id="survey_6_3" 
						value="option3" v-model="surveyAnswers[5]">
						<span class="survey_span">보기3</span>
					</div>
				</div>
				<div class="survey_middle_survey_p_section">
                    <p class="mb-5 text-lg font-semibold survey_p">질문 1</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_7" id="survey_7_1" 
						value="option1" v-model="surveyAnswers[6]" checked>
						<span class="survey_span">보기1</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_7" id="survey_7_2" 
						value="option2" v-model="surveyAnswers[6]">
						<span class="survey_span">보기2</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_7" id="survey_7_3" 
						value="option3" v-model="surveyAnswers[6]">
						<span class="survey_span">보기3</span>
					</div>
				</div>
				<div class="survey_middle_survey_p_section">
                    <p class="mb-5 text-lg font-semibold survey_p">질문 1</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_8" id="survey_8_1" 
						value="option1" v-model="surveyAnswers[7]" checked>
						<span class="survey_span">보기1</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_8" id="survey_8_2" 
						value="option2" v-model="surveyAnswers[7]">
						<span class="survey_span">보기2</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_8" id="survey_8_3" 
						value="option3" v-model="surveyAnswers[7]">
						<span class="survey_span">보기3</span>
					</div>
				</div>
				<div class="survey_middle_survey_p_section">
                    <p class="mb-5 text-lg font-semibold survey_p">질문 1</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_9" id="survey_9_1" 
						value="option1" v-model="surveyAnswers[8]" checked>
						<span class="survey_span">보기1</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_9" id="survey_9_2" 
						value="option2" v-model="surveyAnswers[8]">
						<span class="survey_span">보기2</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_9" id="survey_9_3" 
						value="option3" v-model="surveyAnswers[8]">
						<span class="survey_span">보기3</span>
					</div>
				</div>
				<div class="survey_middle_survey_p_section">
                    <p class="mb-5 text-lg font-semibold survey_p">질문 1</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_10" id="survey_10_1" 
						value="option1" v-model="surveyAnswers[9]" checked>
						<span class="survey_span">보기1</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_10" id="survey_10_2" 
						value="option2" v-model="surveyAnswers[9]">
						<span class="survey_span">보기2</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_10" id="survey_10_3" 
						value="option3" v-model="surveyAnswers[9]">
						<span class="survey_span">보기3</span>
					</div>
				</div>
            </div>

            <div class="survey_bottom_container">
                <div class="survey_bottom_button_area">
                    <button class="survey_bottom_button" type="button">뒤로 가기</button>
                    <button class="survey_bottom_button" type="button" @click="resetSurvey">다시 하기</button>
                    <button class="survey_bottom_button" type="submit">제출 하기</button>
                </div>
            </div>
        </div>    
    </div>    
</template>
<script>
export default {
    name: 'SurveyComponent',
    props: {

    },
    
    components: {

    },

    data() {
        return {
            setting: '',
			surveyAnswers: [
				'',
				'', 
				'', 
				'', 
				'', 
				'', 
				'', 
				'', 
				'', 
				''
			]
        }
    },

    created() {},

    mounted() {},

    methods: {
		resetSurvey() {
			this.surveyAnswers = [
				'option1',
				'option1', 
				'option1', 
				'option1', 
				'option1', 
				'option1', 
				'option1', 
				'option1', 
				'option1', 
				'option1'
			];
		}
    }
}
</script>

<style lang="scss">
    @import '../sass/survey.scss';
</style>