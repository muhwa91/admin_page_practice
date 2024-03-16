<template>
	<div class="box-border admin_login_container">
		<div class="admin_login_section">
			<div class="admin_login_left_section">
				<div class="admin_login_title_section">
					<span class="text-3xl font-bold admin_login_title">BOOKPICK'</span>
				</div>
				<div class="admin_login_input_area">
					<svg class="admin_login_input_svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
					</svg>
					<input class="text-base admin_login_input" type="text" name="admin_number" id="admin_number" 
					autocomplete="off" placeholder="Enter your ID" v-model="admin_number">
				</div>
				<div class="admin_login_input_area">
					<svg class="admin_login_input_svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
					</svg>
					<input class="text-base admin_login_input" type="password" name="admin_password" id="admin_password" 
					autocomplete="off" placeholder="Enter your Password" v-model="admin_password">
				</div>
				<div class="admin_login_button_area">
					<button class="admin_login_button" type="submit" @click="adminLogin">
						<div class="admin_login_button_text_area">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="admin_login_button_svg">
							<path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9" />
							</svg>
						<span class="text-base font-semibold">Login</span>
						</div>
					</button>
				</div>
			</div>
			<div class="admin_login_right_section">
				<img class="admin_login_image" src="../../../public/images/Admin_login.jpg" alt="">
			</div>
		</div>
	</div>
</template>
<script>
export default {
    name: 'AdminLoginComponent',
    props: {

    },
    
    components: {

    },

    data() {
        return {
            setting: '',
			admin_number: '',
			admin_password: '',
        }
    },

    created() {},

    mounted() {},

    methods: {
		adminLogin() {
			const URL = '/admin';            
			const formData = new FormData();
			formData.append('admin_number', this.admin_number);
			formData.append('admin_password', this.admin_password);

			axios.post(URL, formData)
				.then(res => {
					if(res.data.code === "al00") {
						this.$router.push('/admin/index'); 
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
	@import '../../sass/Admin/admin_login.scss';
</style>