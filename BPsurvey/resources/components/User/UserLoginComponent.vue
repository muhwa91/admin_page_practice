<template>
	<div class="box-border user_login_container">
		<div class="user_login_section">
			<div class="user_login_left_section">
				<div class="user_login_title_section">
					<p class="text-3xl font-bold user_login_title">북픽에서 다양한 책을!</p>
					<p class="text-3xl font-bold user_login_title">독서기록을 남겨보세요.</p>
				</div>
				<div class="user_login_input_area">
					<svg class="user_login_input_svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
					</svg>
					<input class="text-base user_login_input" type="text" name="user_email" id="user_email" 
					autocomplete="off" placeholder="아이디를 입력 해 주세요." v-model="user_email">
				</div>
				<div class="user_login_input_area">
					<svg class="user_login_input_svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
					</svg>
					<input class="text-base user_login_input" type="password" name="user_password" id="user_password" 
					autocomplete="off" placeholder="비밀번호를 입력 해 주세요." v-model="user_password">
				</div>
				<div class="user_login_button_area">
					<button class="user_login_button" type="submit" @click="userLogin">
						<div class="user_login_button_text_area">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="user_login_button_svg">
							<path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9" />
							</svg>
						<span class="text-base font-semibold">Login</span>
						</div>
					</button>
				</div>
                <div class="font-semibold text-center user_login_register">
                    <router-link to="/register" class="user_login_register_a">아직 북픽 회원이 아니신가요?↗</router-link>
                </div>
			</div>
		</div>
	</div>
</template>
<script>
import axios from 'axios';
export default {
    name: 'UserLoginComponent',
    props: {

    },
    
    components: {

    },

    data() {
        return {
            setting: '',
			user_email: '',
			user_password: '',
        }
    },

    created() {},

    mounted() {},

    methods: {
		userLogin() {
			const URL = '/login';            
            const formData = new FormData();
            formData.append('user_email', this.user_email);
            formData.append('user_password', this.user_password);
			
            axios.post(URL, formData)
            .then(res => {                
				console.log("진입")
				if(res.data.code === "ul00") {
                    this.$router.push('/'); 
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
	@import '../../sass/User/user_login.scss';
</style>