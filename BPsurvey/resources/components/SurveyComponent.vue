<template>
    <div class="border-box survey_container">
        <div class="survey_section">

			<div class="survey_top_container">
				<span class="text-3xl font-bold survey_top_title_span">BOOKPICK'</span>
				<span class="text-2xl font-bold survey_top_content_span">만족도 조사</span>
			</div>

			<div class="survey_middle_container" v-for="question in surveyQuestionList" :key="question"> 
				<div class="survey_middle_survey_p_section">
					<p class="mb-5 text-lg font-semibold survey_p">{{ question.survey_question_title }}</p>
				</div>
				<div class="survey_middle_survey_input_section">
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" :name="'surveyAnswer_'+question.survey_question_id" :id='"surveyAnswer_"+question.survey_question_id+"_1"' 
						value="satisfied" checked>
						
						<span class="survey_span"> 만족</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" :name="'surveyAnswer_'+question.survey_question_id" :id='"surveyAnswer_"+question.survey_question_id+"_2"' 
						value="average">
						<span class="survey_span"> 보통</span>
					</div>
					<div class="mb-5 survey_middle_survey_input_area">
						<input class="survey_input" type="radio" :name="'surveyAnswer_'+question.survey_question_id" :id='"surveyAnswer_"+question.survey_question_id+"_3"'
						value="dissatisfied">
						<span class="survey_span"> 불만족</span>
					</div>
				</div>
			</div>

			<div class="survey_bottom_container">
				<div class="survey_bottom_button_area">
					<router-link to="/"><button class="survey_bottom_button" type="button">뒤로 가기</button></router-link>
					<button class="survey_bottom_button" type="submit" @click="surveyAnswer">제출 하기</button>
				</div>
			</div>
        </div>    
    </div>
</template>
<script>
import axios from 'axios';

export default {
    name: 'SurveyComponent',
    props: {

    },
    
    components: {

    },

    data() {
        return {
            setting: '',
			surveyAnswers: {
				
			},
			surveyQuestionList: [

			],
        }
    },

    created() {
		this.surveyList();
	},

    mounted() {
	},

    methods: {
		// 만족도 조사 질문
		surveyList() {
			const URL = '/survey/user';
			axios.get(URL)
			.then(response => {
				console.log(response.data.data);
				this.surveyQuestionList = response.data.data;
			})
			.catch(error => {
				console.error('데이터 에러:', error);
			});
		},

		// 만족도 조사 응답
		surveyAnswer() {
			const URL = '/survey';
			const formData = new FormData();

			for (const question of this.surveyQuestionList) {
			const answer = document.querySelector(`input[name="surveyAnswer_${question.survey_question_id}"]:checked`).value;
			formData.append(`surveyAnswer_${question.survey_question_id}`, answer);
			}

			axios.post(URL, formData)
				.then(response => {
					if(response.data.code === "sp00") {
						alert('조사에 참여해주셔서 감사합니다.')
						this.$router.push('/'); 
					} else {                
						alert(response.data.error);
					}
				})
				.catch(error => {
					console.error('Unexpected error:', error);
				})
		}
	}
}
</script>

<style lang="scss">
    @import '../sass/survey.scss';
</style>