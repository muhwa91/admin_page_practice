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
						<input class="survey_input" type="radio" name="survey_1_1" id="survey_1_1" 
						v-model="survey_1_1">
						<span class="survey_span">보기 1</span>
						<input class="survey_input" type="radio" name="survey_1_2" id="survey_1_2" 
						v-model="survey_1_2">
						<span class="survey_span">보기 2</span>
						<input class="survey_input" type="radio" name="survey_1_3" id="survey_1_1" 
						v-model="survey_1_3">
						<span class="survey_span">보기 3</span>
					</div>
				</div>
				<div class="survey_middle_survey_p_section">
                    <p class="mb-5 text-lg font-semibold survey_p">질문 1</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_2_1" id="survey_2_1" 
						v-model="survey_2_1">
						<span class="survey_span">보기1</span>
						<input class="survey_input" type="radio" name="survey_2_2" id="survey_2_2" 
						v-model="survey_2_2">
						<span class="survey_span">보기2</span>
						<input class="survey_input" type="radio" name="survey_2_3" id="survey_2_3" 
						v-model="survey_2_3">
						<span class="survey_span">보기3</span>
					</div>
				</div>
				<div class="survey_middle_survey_p_section">
                    <p class="mb-5 text-lg font-semibold survey_p">질문 1</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_3_1" id="survey_3_1" 
						v-model="survey_3_1">
						<span class="survey_span">보기1</span>
						<input class="survey_input" type="radio" name="survey_3_2" id="survey_3_2" 
						v-model="survey_3_2">
						<span class="survey_span">보기2</span>
						<input class="survey_input" type="radio" name="survey_3_3" id="survey_3_3" 
						v-model="survey_3_3">
						<span class="survey_span">보기3</span>
					</div>
				</div>
				<div class="survey_middle_survey_p_section">
                    <p class="mb-5 text-lg font-semibold survey_p">질문 1</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_4_1" id="survey_4_1" 
						v-model="survey_4_1">
						<span class="survey_span">보기1</span>
						<input class="survey_input" type="radio" name="survey_4_2" id="survey_4_2" 
						v-model="survey_4_2">
						<span class="survey_span">보기2</span>
						<input class="survey_input" type="radio" name="survey_4_3" id="survey_4_3" 
						v-model="survey_4_3">
						<span class="survey_span">보기3</span>
					</div>
				</div>
				<div class="survey_middle_survey_p_section">
                    <p class="mb-5 text-lg font-semibold survey_p">질문 1</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_5_1" id="survey_5_1" 
						v-model="survey_5_1">
						<span class="survey_span">보기1</span>
						<input class="survey_input" type="radio" name="survey_5_2" id="survey_5_2" 
						v-model="survey_5_2">
						<span class="survey_span">보기2</span>
						<input class="survey_input" type="radio" name="survey_5_3" id="survey_5_3" 
						v-model="survey_5_3">
						<span class="survey_span">보기3</span>
					</div>
				</div>
				<div class="survey_middle_survey_p_section">
                    <p class="mb-5 text-lg font-semibold survey_p">질문 1</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_6_1" id="survey_6_1" 
						v-model="survey_6_1">
						<span class="survey_span">보기1</span>
						<input class="survey_input" type="radio" name="survey_6_2" id="survey_6_2" 
						v-model="survey_6_2">
						<span class="survey_span">보기2</span>
						<input class="survey_input" type="radio" name="survey_6_3" id="survey_6_3" 
						v-model="survey_6_3">
						<span class="survey_span">보기3</span>
					</div>
				</div>
				<div class="survey_middle_survey_p_section">
                    <p class="mb-5 text-lg font-semibold survey_p">질문 1</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_7_1" id="survey_7_1" 
						v-model="survey_7_1">
						<span class="survey_span">보기1</span>
						<input class="survey_input" type="radio" name="survey_7_2" id="survey_7_2" 
						v-model="survey_7_2">
						<span class="survey_span">보기2</span>
						<input class="survey_input" type="radio" name="survey_7_3" id="survey_7_3" 
						v-model="survey_7_3">
						<span class="survey_span">보기3</span>
					</div>
				</div>
				<div class="survey_middle_survey_p_section">
                    <p class="mb-5 text-lg font-semibold survey_p">질문 1</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_8_1" id="survey_8_1" 
						v-model="survey_8_1">
						<span class="survey_span">보기1</span>
						<input class="survey_input" type="radio" name="survey_8_2" id="survey_8_2" 
						v-model="survey_8_2">
						<span class="survey_span">보기2</span>
						<input class="survey_input" type="radio" name="survey_8_3" id="survey_8_3" 
						v-model="survey_8_3">
						<span class="survey_span">보기3</span>
					</div>
				</div>
				<div class="survey_middle_survey_p_section">
                    <p class="mb-5 text-lg font-semibold survey_p">질문 1</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_9_1" id="survey_9_1" 
						v-model="survey_9_1">
						<span class="survey_span">보기1</span>
						<input class="survey_input" type="radio" name="survey_9_2" id="survey_9_2" 
						v-model="survey_9_2">
						<span class="survey_span">보기2</span>
						<input class="survey_input" type="radio" name="survey_9_3" id="survey_9_3" 
						v-model="survey_9_3">
						<span class="survey_span">보기3</span>
					</div>
				</div>
				<div class="survey_middle_survey_p_section">
                    <p class="mb-5 text-lg font-semibold survey_p">질문 1</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" name="survey_10_1" id="survey_10_1" 
						v-model="survey_10_1">
						<span class="survey_span">보기1</span>
						<input class="survey_input" type="radio" name="survey_10_2" id="survey_10_2" 
						v-model="survey_10_2">
						<span class="survey_span">보기2</span>
						<input class="survey_input" type="radio" name="survey_10_3" id="survey_10_3" 
						v-model="survey_10_3">
						<span class="survey_span">보기3</span>
					</div>
				</div>
            </div>

            <div class="survey_bottom_container">
                <div class="survey_bottom_button_area">
                    <button class="survey_bottom_button" type="button">뒤로 가기</button>
                    <button class="survey_bottom_button" type="reset">다시 하기</button>
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
        }
    },

    created() {},

    mounted() {},

    methods: {

    }
}
</script>

<style lang="scss">
    @import '../sass/survey.scss';
</style>