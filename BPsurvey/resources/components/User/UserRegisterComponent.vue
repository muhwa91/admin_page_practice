<template>
	<div>
		<!-- 이용약관 -->
		<div class="regist_terms_box" :class="{ 'container_signup_none': registerFirstFlg }">
			<div class="terms_conditions_box">
				<p class="text-center"><strong>서비스 이용약관</strong></p>
				<p><strong>제1조 (목적)</strong></p>
					<br>
				<p>이 이용약관은 [BOOKPICK'] (이하 "회사"라 함)이 운영하는 인터넷 관련 서비스 및 기타 관련 제반 서비스(이하 "서비스"라 함)를 이용함에 있어 회사와 이용자의 권리, 의무 및 책임 사항을 규정함을 목적으로 합니다.</p>
					<br>
				<p><strong>제2조 (약관의 효력과 변경)</strong></p>
					<br>
				<p>본 약관은 서비스를 신청한 이용자가 본 약관에 동의하고 회사가 정한 가입신청 양식에 기반하여 가입을 완료하는 시점부터 효력이 발생합니다.</p>
				<p>1. 회사는 필요한 경우 관련 법령 및 회사의 내부 정책을 반영하여 이 약관을 변경할 수 있으며, 변경된 약관은 회사의 홈페이지나 서비스 내 공지를 통해 이용자에게 공지됩니다.</p> 
				<p>변경된 약관은 공지 후 7일 이내에 이용자의 동의 없이 적용됩니다. </p>
				<p>2. 이용자가 변경된 약관에 동의하지 않을 경우 회사는 해당 이용자에 대하여 서비스 제공을 중단할 수 있습니다.</p>
					<br>
				<p><strong>제3조 (이용자의 의무)</strong></p>
					<br>
				<p>1. 이용자는 서비스 이용 시 관련 법령, 약관, 공지사항, 회사의 안내 등에 따라 서비스를 이용해야 하며, 회사의 명시적 동의 없이는 서비스를 이용하여 얻은 정보를 복제, 유통, 출판하거나 상업적으로 이용할 수 없습니다.</p>
				<p>2. 이용자는 서비스 이용 시 다음 각 호의 행위를 하지 않아야 합니다.</p>
				<p>가. 타인의 정보를 도용하거나 부정한 목적으로 이용하는 행위</p>
				<p>나. 서비스를 통해 전송되는 컨텐츠를 위변조, 삭제, 변경하는 행위</p>
				<p>다. 서비스의 안전성, 안정성 및 정상적인 운영을 방해하는 행위</p>
					<br>
				<p><strong>제4조 (회사의 의무)</strong></p>
					<br>
				<p>회사는 이용자의 개인정보 보호를 위해 최선을 다하며, 관련 법령에 따라 이를 처리합니다.</p>
				<p>회사는 서비스 제공을 위해 지속적으로 시스템 및 네트워크 관리를 개선하며, 서비스 이용 중 발생하는 장애나 문제에 대하여 신속하게 조치합니다.</p>
					<br>
				<p><strong>제5조(개인정보의 안전성 확보 조치)</strong></p>
					<br>
				<p>1. 회사는 개인정보보호법 제29조에 따라 다음과 같이 안전성 확보에 필요한 기술적, 관리적, 물리적 조치를 하고 있습니다.</p>
				<p>가. 개인정보 암호화: 이용자의 개인정보는 암호화되어 저장 및 관리됩니다.</p>
				<p>나. 접근 제한: 개인정보를 처리하는 데이터베이스시스템에 대한 접근 권한을 최소한으로 제한하고 있습니다.</p>
				
			</div>
			
			<div class="mb-5 text-center terms_conditions_checkbox_btn">
				<input class="terms_conditions_checkbox" type="checkbox" v-model="registerFormData.userTermsOfUse" />
				<label class="terms_conditions_label">이용약관 및 개인정보수집 및 이용에 모두 동의합니다.</label>
			</div>
			<div class="regist_button">
				<div class="text-center regist_button_button_area">
					<router-link :to="'/'" class="regist_button_cancel">취소</router-link>
				</div>
				<div class="text-center regist_button_button_area">
					<button class="regist_button_next" type="button" @click="moveSecondRegist">다음</button>
				</div>
			</div>
		</div>		

		<!-- 회원가입 -->
		<div class="box-border user_register_container" :class="{ 'container_signup_none': registerSecondFlg }">
			<div class="user_register_section">
				<div class="user_register_left_section">
					<div class="user_register_title_section">
						<p class="text-3xl font-bold user_register_title">BOOKPICK'</p>
						<p class="text-3xl font-bold user_register_title_sub">북픽 회원가입</p>
					</div>
					<div class="user_register_input_area">
						<label class="font-bold" for="user_id">아이디</label>
						<input class="text-base user_register_input" type="email" name="user_email" id="user_email" 
						autocomplete="off" placeholder="example@email.com" v-model="user_email">
					</div>
					<div class="user_register_input_area">
						<label class="font-bold" for="user_password">비밀번호</label>
						<input class="text-base user_register_input" type="password" name="user_password" id="user_password" 
						autocomplete="off" placeholder="비밀번호를 입력 해 주세요." v-model="user_password">
					</div>
					<div class="user_register_input_area">
						<label class="font-bold" for="user_password_confirm">비밀번호 확인</label>
						<input class="text-base user_register_input" type="password" name="user_password_confirm" id="user_password_confirm" 
						autocomplete="off" placeholder="비밀번호를 입력 해 주세요." v-model="user_password_confirm">
					</div>
					<div class="user_register_input_area">
						<label class="font-bold" for="user_name">이름</label>
						<input class="text-base user_register_input" type="text" name="user_name" id="user_name" 
						autocomplete="off" placeholder="이름을 입력 해 주세요." v-model="user_name">
					</div>
					<div class="user_register_input_area">
						<label class="font-bold" for="user_birthdate">생년월일</label>
						<input class="text-base user_register_input" type="date" name="user_birthdate" id="user_birthdate" 
						autocomplete="off" v-model="user_birthdate">
					</div>
					<div class="user_register_input_area">
						<label class="font-bold" for="gender">성별</label>
						<select name="user_gender" id="user_gender" v-model="user_gender">
							<option value="select">선택안함</option>
							<option value="male">남자</option>
							<option value="female">여자</option>
						</select>
					</div>
					<div class="user_register_input_area">
						<label class="font-bold" for="carrier">통신사</label>
						<select name="user_carrier" id="user_carrier" v-model="user_carrier">
							<option value="select">선택안함</option>
							<option value="KT">KT</option>
							<option value="LGU+">LGU+</option>
							<option value="SKT">SKT</option>
						</select>
					</div>
					<div class="user_register_input_area">
						<label class="font-bold" for="user_tel">휴대폰 번호</label>
						<input class="text-base user_register_input" type="tel" name="user_tel" id="user_tel" 
						autocomplete="off" placeholder="'-'없이 숫자만 입력 해 주세요." maxlength="11" v-model="user_tel">
					</div>
					<div class="user_register_button_area">
						<button class="user_register_button" type="submit" @click="userRegister">
							<div class="user_register_button_text_area">
							<span class="text-base font-semibold">가입하기</span>
							</div>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import axios from 'axios';
export default {
    name: 'UserRegisterComponent',
    props: {

    },
    
    components: {

    },

    data() {
        return {
            setting: '',
			registerFirstFlg: false,
			registerSecondFlg: true,
			// 현재 날짜 저장용
			birthdate: '', 
			// 회원가입 유저제출 데이터 저장용
			registerFormData: {
				user_email: '',
				user_password: '',
				user_password_confirm: '',
				user_name: '',
				user_birthdate: '',
				user_gender: '',
				user_carrier: '',
				user_tel: '',
				userTermsOfUse: '',
			},
        }
    },

    created() {},

    mounted() {
		// 현재 날짜 YYYY-MM-DD 변환
        const today = new Date().toISOString().slice(0, 10);
        // 데이터에 현재 날짜 할당
        this.user_birthdate = today;
	},

    methods: {
		moveSecondRegist() {
            if(this.registerFormData.userTermsOfUse) {
                this.registerFirstFlg = true;
                this.registerSecondFlg = false;
            }
            else {
                alert('이용약관에 동의 체크 해주세요');
            }
        },
		
		userRegister() {
            const URL = '/register';            
            const formData = new FormData();
            formData.append('user_email', this.user_email);
            formData.append('user_password', this.user_password);
            formData.append('user_password_confirm', this.user_password_confirm);
            formData.append('user_name', this.user_name);
            formData.append('user_birthdate', this.user_birthdate);
            formData.append('user_gender', this.user_gender);
            formData.append('user_carrier', this.user_carrier);
            formData.append('user_tel', this.user_tel);

            axios.post(URL, formData)
				.then(res => {                
					if(res.data.code === "ur00") {
						alert('회원가입이 완료되었습니다. 로그인 해 주세요.');
						this.$router.push('/login'); 
					} else {                
						alert(res.data.error);
					}
				})
				.catch(err => {                
					console.error('Unexpected error:', err);
				});
        }
    }
}
</script>
<style lang="scss">
	@import '../../sass/User/user_register.scss';
</style>