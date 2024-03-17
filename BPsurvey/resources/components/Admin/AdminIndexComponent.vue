<template>
	<div class="border-box admin_index_container">
		<div class="admin_index_section">
			<div class="admin_index_left_container">
				<div class="text-center admin_index_left_info_section">
					<a href="/admin/index" class="text-3xl font-bold admin_index_left_info_title_area" @click="showIndex">BOOKPICK'</a>
					<span class="text-xl font-semibold admin_index_left_info_name_area">여중기</span>
				</div>
					<p class="mb-5 font-semibold text-center">권한 : Lv2</p>
				<hr>
				<div class="admin_index_left_search_section">
					<input class="admin_index_left_search_input" type="search" name="" id="" placeholder="Search here">
				</div>
				<div class="admin_index_left_nav_section">
					<ul class="admin_index_left_nav_ul">
						<li class="admin_index_left_nav_li">
							<a class="font-semibold admin_index_left_nav_dropdown_a" href="#" @click="toggleUserDropdown">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 admin_index_left_nav_dropdown_left_svg">
									<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
								</svg>
								User
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 admin_index_left_nav_dropdown_right_svg">
									<path stroke-linecap="round" stroke-linejoin="round" d="m4.5 5.25 7.5 7.5 7.5-7.5m-15 6 7.5 7.5 7.5-7.5" />
								</svg>
							</a>
							<ul class="admin_index_left_nav_dropdown_ul" v-if="userDropdown">
								<li>
									<a class="font-semibold admin_index_left_nav_a" href="/admin/auth/user/management">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
										</svg>
										Management
									</a>
								</li>
							</ul>
						</li>
						<li class="admin_index_left_nav_li" v-if="isAdmin">
							<a class="font-semibold admin_index_left_nav_dropdown_a" href="#" @click="toggleAdminDropdown">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 admin_index_left_nav_dropdown_left_svg">
									<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
								</svg>
								Administrator
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 admin_index_left_nav_dropdown_right_svg">
									<path stroke-linecap="round" stroke-linejoin="round" d="m4.5 5.25 7.5 7.5 7.5-7.5m-15 6 7.5 7.5 7.5-7.5" />
								</svg>
							</a>
							<ul class="admin_index_left_nav_dropdown_ul" v-if="adminDropdown">
								<li>
									<a class="font-semibold admin_index_left_nav_a" href="#">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 
											0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
										</svg>
										Management
									</a>
								</li>
								<li>
									<a href="/admin/registration" class="font-semibold admin_index_left_nav_a" @click="showRegistration">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 
											4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 
											1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
										</svg>
										Registration
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<div v-if="showAdminIndex">
				<div class="admin_index_right_container">
					<div class="admin_index_right_top_container">
						<div class="admin_index_right_top_title_section">
							<div class="admin_index_right_top_title_area">
								<span class="mb-5 text-xl font-bold">반가워요, 여중기 관리자님!</span>
								<span>시스템 관리를 간편하고 효율적으로 할 수 있도록 도와드릴게요.</span>
							</div>
							<a href="#">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
								</svg>
							</a>
						</div>	
					</div>
					<div class="admin_index_right_middle_container">
						<div class="mr-5 admin_index_right_middle_section">
							<div class="admin_index_right_middle_number_of_transactions">
								<div class="admin_index_right_middle_number_of_transactions_image">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
									</svg>							
								</div>
								<div class="admin_index_right_middle_number_of_transactions_text">
									<p class="font-semibold">총 결제 건수</p>
									<span class="text-3xl font-extrabold">10,000,000 </span>
									<span class="font-semibold">건</span>
								</div>
							</div>
						</div>
						<div class="mr-5 admin_index_right_middle_section">
							<div class="admin_index_right_middle_paymont_amount">
								<div class="admin_index_right_middle_paymont_amount_image">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
										<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
									</svg>
								</div>
								<div class="admin_index_right_middle_paymont_amount_text">
									<p class="font-semibold">총 결제금액</p>
									<span class="text-3xl font-extrabold">10,000,000 </span>
									<span class="font-semibold">원</span>
								</div>
							</div>
						</div>
						<div class="admin_index_right_middle_section">
							<div class="admin_index_right_middle_register_users">
								<div class="admin_index_right_middle_register_users_image">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
										<path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
									</svg>
								</div>
								<div class="admin_index_right_middle_register_users_text">
									<p class="font-semibold">총 이용자 수</p>
									<span class="text-3xl font-extrabold">10,000,000 </span>
									<span class="font-semibold">명</span>
								</div>
							</div>
						</div>					
					</div>
					<div class="admin_index_right_bottom_container">
						<div class="admin_index_right_bottom_chart_section">
							<div class="admin_index_right_bottom_chart_area">
								<p class="mb-5 text-xl font-semibold">월 별, 분기 별 통계</p>
								<img class="admin_index_right_bottom_chart_image" src="../../../public/images/Admin_chart_ex.png" alt="">
							</div>
						</div>
						<div class="admin_index_right_bottom_text_section">
							<div class="mr-5 admin_index_right_bottom_notice_section">
								<div class="admin_index_right_bottom_notice_title_area">
									<span class="mb-5 text-xl font-semibold">공지사항</span>
									<a class="admin_index_right_bottom_notice_title_a" href="#">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
										</svg>
									More
									</a>
								</div>
								<div class="admin_index_right_bottom_notice_content_area">
									
								</div>
							</div>
							<div class=" admin_index_right_bottom_latest_Posts_section">
								<div class="admin_index_right_bottom_latest_Posts_title_area">
									<span class="mb-5 text-xl font-semibold">최신 작성 글</span>
									<a class="admin_index_right_bottom_latest_Posts_title_a" href="#">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
													<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
										</svg>
									More
									</a>
								</div>
								<div class="admin_index_right_bottom_latest_Posts_content_area">
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- User 탈퇴 -->
			<!-- <div v-if="showAdminUserManagement">
				<div class="admin_index_right_container">
					
				</div>
			</div> -->

			<!-- Admin 권한 수정 및 탈퇴 -->
			<!-- <div v-if="showAdminManagement">
				<div class="admin_index_right_container">
					
				</div>
			</div> -->

			<!-- Admin 등록 -->
			<div v-if="showAdminRegistration">
				<div class="admin_index_right_container">
					<div class="admin_index_registration_section">
						<div class="admin_registration_input_area">
							<label class="font-bold" for="admin_number">사원번호</label>
							<input class="text-base admin_registration_input" type="email" name="admin_number" id="admin_number" 
							autocomplete="off" placeholder="사원번호를 입력 해 주세요." maxlength="5" v-model="admin_number">
						</div>
						<div class="admin_registration_input_area">
							<label class="font-bold" for="admin_password">비밀번호</label>
							<input class="text-base admin_registration_input" type="password" name="admin_password" id="admin_password" 
							autocomplete="off" placeholder="비밀번호를 입력 해 주세요." v-model="admin_password">
						</div>
						<div class="admin_registration_input_area">
							<label class="font-bold" for="admin_password_confirm">비밀번호 확인</label>
							<input class="text-base admin_registration_input" type="password" name="admin_password_confirm" id="admin_password_confirm" 
							autocomplete="off" placeholder="비밀번호를 입력 해 주세요." v-model="admin_password_confirm">
						</div>
						<div class="admin_registration_input_area">
							<label class="font-bold" for="admin_name">이름</label>
							<input class="text-base admin_registration_input" type="text" name="admin_name" id="admin_name" 
							autocomplete="off" placeholder="이름을 입력 해 주세요." v-model="admin_name">
						</div>
						<div class="admin_registration_input_area">
							<label class="font-bold" for="admin_flg">권한</label>
							<select name="admin_flg" id="admin_flg" v-model="admin_flg">
								<option value="1">root</option>
								<option value="2">sub</option>
							</select>
						</div>
						<div class="admin_registration_button_area">
							<button class="admin_registration_button" type="submit" @click="adminRegister">
								<div class="admin_registration_button_text_area">
								<span class="text-base font-semibold">등록하기</span>
								</div>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import axios from 'axios';
export default {
    name: 'AdminIndexComponent',
    props: {

    },
    
    components: {

    },

    data() {
        return {
            setting: '',
			userDropdown: false,
			adminDropdown: false,
			registerFormData: {
				admin_number: '',
				admin_password: '',
				admin_password_confirm: '',
				admin_name: '',
				admin_flg: '',
			},
			isAdmin: false,
			showAdminIndex: true,
			showAdminRegistration: false,
        }
    },

    created() {		
		this.showAdminUserManagement = this.$route.path === '/admin/auth/user/management';
		this.showAdminRegistration = this.$route.path === '/admin/registration';
		this.showAdminIndex = this.$route.path === '/admin/index';

		if (this.showAdminIndex) {
			this.showAdminRegistration = false;
			this.showAdminUserManagement = false;
		} else if (this.showAdminUserManagement) {
			this.showAdminIndex = false;
			this.showAdminRegistration = false;
		} else {
			this.showAdminIndex = false;
			this.showAdminUserManagement = false;
		}
	},

    mounted() {
		const adminFlg = localStorage.getItem('loginAdminData');
		// root Admin 접속
		if (adminFlg === '1') {
        this.isAdmin = true;
		} else if (adminFlg === '2') {
			this.isAdmin = false;
		}
		console.log(adminFlg);
	},

	methods: {
		toggleUserDropdown() {
			this.userDropdown = !this.userDropdown;
		},

		toggleAdminDropdown() {
			this.adminDropdown = !this.adminDropdown;
		},

		showIndex() {
            this.showAdminIndex = true;
            this.showAdminRegistration = false;
			this.showAdminUserManagement = false;
        },

		showRegistration() {
            this.showAdminIndex = false;
            this.showAdminRegistration = true;
        },

		adminRegister() {
            const URL = '/admin/index';            
            const formData = new FormData();
            formData.append('admin_number', this.admin_number);
            formData.append('admin_password', this.admin_password);
            formData.append('admin_password_confirm', this.admin_password_confirm);
            formData.append('admin_name', this.admin_name);
            formData.append('admin_flg', this.admin_flg);

            axios.post(URL, formData)
				.then(response => {                
					if(response.data.code === "ar00") {
						alert('어드민계정이 생성되었습니다.');
						this.$router.push('/admin/index'); 
					} else {                
						alert(response.data.error);
					}
				})
				.catch(error => {                
					console.error('Unexpected error:', error);
				});
        }
    }
}
</script>

<style lang="scss">
    @import '../../sass/Admin/admin_index.scss';
</style>