<template>
	<div class="border-box admin_index_container">
		<div class="admin_index_section">
			<div class="admin_index_left_container">
				<div class="text-center admin_index_left_info_section">
					<a href="/admin/index" class="text-3xl font-bold admin_index_left_info_title_area" @click="showIndex">BOOKPICK'</a>
					<span class="text-xl font-semibold admin_index_left_info_name_area">{{ loginAdminName }}</span>
				</div>
					<p class="mb-5 font-semibold text-center">권한 : {{ loginAdminFlg }}</p>
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
									<a class="font-semibold admin_index_left_nav_a" href="/admin/auth/user/management" @click="showUserMenuManagement">
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
									<a class="font-semibold admin_index_left_nav_a" href="/admin/auth/management" @click="showAdminMenuManagement">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 
											0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
										</svg>
										Management
									</a>
								</li>
								<li>
									<a class="font-semibold admin_index_left_nav_a" href="/admin/registration" @click="showAdminMenuRegistration">
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
								<span class="mb-5 text-xl font-bold">반가워요, {{ loginAdminName }} 관리자님!</span>
								<span>시스템 관리를 간편하고 효율적으로 할 수 있도록 도와드릴게요.</span>
							</div>
							<a class="text-center" href="/admin" @click="adminLogout" v-if="isAdmin">로그아웃</a>
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
									<p class="font-semibold">총 가입유저 수</p>
									<span class="text-3xl font-extrabold">{{ totalRegisterUser }}</span>
									<span class="font-semibold"> 명</span>
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
									<p class="font-semibold">금일 가입유저 수</p>
									<span class="text-3xl font-extrabold">{{ totalTodayRegisterUser }}</span>
									<span class="font-semibold"> 명</span>
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
									<p class="font-semibold">만족도 조사 참여유저 수</p>
									<span class="text-3xl font-extrabold">{{ totalSurveyResponseUser }}</span>
									<span class="font-semibold"> 명</span>
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
			<div v-if="showAdminUserManagement">
				<div class="admin_index_right_container">
					<div class="admin_auth_user_section">
						<div class="admin_user_top_container">
							<div class="admin_user_title_section">
								<p class="text-3xl font-semibold">유저관리</p>
							</div>
						</div>

						<div class="admin_user_middle_container">
							<div class="admin_user_info_title_section">
								<p class="mb-10 text-xl font-medium text-center">유저 이메일</p>
								<p class="mb-10 text-xl font-medium text-center">유저 이름</p>
								<p class="mb-10 text-xl font-medium text-center">유저 가입날짜</p>
								<p class="mb-10 text-xl font-medium text-center">탈퇴여부</p>
								<p class="mb-10 text-xl font-medium text-center">탈퇴관리</p>
							</div>
							<div class="admin_user_info_content_section" v-for="userInfo in userAllList" :key="userInfo">
								<div class="user_info_section">
									<p class="text-center">{{ userInfo.user_email }}</p>
								</div>
								<div class="user_info_section">
									<p class="text-center">{{ userInfo.user_name }}</p>
								</div>
								<div class="user_info_section">
									<p class="text-center">{{ userInfo.user_created }}</p>
								</div>
								<div class="user_info_section">
									<p class="text-center">{{ userInfo.user_deleted }}</p>
								</div>
								<div class="user_button_section">
									<div class="text-center user_button_area" v-if="userInfo.user_deleted">
										<button class="user_withdrawal_button" type="submit" @click="userWithdrawal(userInfo.user_email)">탈퇴</button>
									</div>
								</div>
							</div>
						</div>
						<!-- 페이지네이션 -->
						<div class="admin_user_bottom_container">

						</div>
					</div>
				</div>
			</div>

			<!-- Admin 권한 수정 및 탈퇴 -->
			<div v-if="showAdminAdminManagement">
				<div class="admin_index_right_container">
					<div class="admin_auth_admin_section">
						<div class="admin_admin_top_container">
							<div class="admin_admin_title_section">
								<p class="text-3xl font-semibold">어드민 관리</p>
							</div>
						</div>
						
						<div class="admin_admin_middle_container">
							<div class="admin_admin_info_title_section">
								<p class="mb-10 text-xl font-medium text-center">사원번호</p>
								<p class="mb-10 text-xl font-medium text-center">사원이름</p>
								<p class="mb-10 text-xl font-medium text-center">등록날짜</p>
								<p class="mb-10 text-xl font-medium text-center">탈퇴여부</p>
								<p class="mb-10 text-xl font-medium text-center">권한 및 탈퇴관리</p>
							</div>
							<div class="admin_admin_info_content_section" v-for="adminInfo in adminAllList" :key="adminInfo">
								<div class="admin_info_section">
									<p class="text-center">{{ adminInfo.admin_number }}</p>
								</div>
								<div class="admin_info_section">									
									<p class="text-center">{{ adminInfo.admin_name }}</p>
								</div>
								<div class="admin_info_section">									
									<p class="text-center">{{ adminInfo.admin_created }}</p>
								</div>
								<div class="admin_info_section">									
									<p class="text-center">{{ adminInfo.admin_deleted }}</p>
								</div>
								<div class="admin_button_section">									
									<div class="admin_auth_area">
										<div class="mr-10 text-center admin_select_area">
											<select class="text-center" name="admin_flg" id="admin_flg">
												<option v-if="adminInfo.admin_flg === 2" value="1" selected>root</option>
												<option v-if="adminInfo.admin_flg === 1" value="2" selected>sub</option>
											</select>
										</div>
										<div class="text-center admin_button_area" v-if="adminInfo.admin_deleted">
											<button class="mb-1 admin_withdrawal_button" @click="adminUpdate(adminInfo.admin_number)">변경</button>
											<button class="admin_withdrawal_button" @click="adminWithdrawal(adminInfo.admin_number)">탈퇴</button>
										</div>
									</div>
								</div>								
							</div>							
						</div>
						<!-- 페이지네이션 -->
						<div class="admin_admin_bottom_container">

						</div>
					</div>
				</div>
			</div>

			<!-- Admin 등록 -->
			<div v-if="showAdminRegistration">
				<div class="admin_index_right_container">
					<div class="admin_index_registration_section">
						<div class="admin_registration_input_area">
							<label class="font-bold" for="admin_number">사원번호</label>
							<input class="text-base admin_registration_input" type="email" name="admin_number" id="admin_number" 
							autocomplete="off" placeholder="사원번호를 입력 해 주세요." maxlength="5" v-model="registerFormData.admin_number">
						</div>
						<div class="admin_registration_input_area">
							<label class="font-bold" for="admin_password">비밀번호</label>
							<input class="text-base admin_registration_input" type="password" name="admin_password" id="admin_password" 
							autocomplete="off" placeholder="비밀번호를 입력 해 주세요." v-model="registerFormData.admin_password">
						</div>
						<div class="admin_registration_input_area">
							<label class="font-bold" for="admin_password_confirm">비밀번호 확인</label>
							<input class="text-base admin_registration_input" type="password" name="admin_password_confirm" id="admin_password_confirm" 
							autocomplete="off" placeholder="비밀번호를 입력 해 주세요." v-model="registerFormData.admin_password_confirm" @input="valAdminPasswordConfirm">
							<div class="w-full text-xs text-red-500 error_message" v-if="errors.admin_password_confirm">{{ errors.admin_password_confirm }}</div>
						<div class="w-full text-xs text-blue-500 success_message" v-else-if="!errors.admin_password_confirm && registerFormData.admin_password_confirm">비밀번호가 일치합니다</div>
						<div class="w-full text-xs text-red-500 error_message" v-else-if="validationErrorMsg.admin_password_confirm">{{ validationErrorMsg.admin_password_confirm }}</div>
						</div>
						<div class="admin_registration_input_area">
							<label class="font-bold" for="admin_name">이름</label>
							<input class="text-base admin_registration_input" type="text" name="admin_name" id="admin_name" 
							autocomplete="off" placeholder="이름을 입력 해 주세요." v-model="registerFormData.admin_name">
						</div>
						<div class="admin_registration_input_area">
							<label class="font-bold" for="admin_flg">권한</label>
							<select name="admin_flg" id="admin_flg">
								<option value="1">root</option>
								<option value="2" selected>sub</option>
							</select>
						</div>
						<p class="text-lg text-center text-red-500">{{ errorMsg }}</p>
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
import Chart from 'chart.js/auto';

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
			showAdminUserManagement: false,
			showAdminAdminManagement: false,
			showAdminRegistration: false,
			userAllList: [],
			adminAllList: [],
			userWithdrawalFormData: {
				user_email: '',
			},
			adminWithdrawalFormData: {
				admin_number: '',
			},
			loginAdminFlg: '',
			loginAdminName: '',
			errorMsg: '',
			totalRegisterUser: 0,
			totalTodayRegisterUser: 0,
			totalSurveyResponseUser: 0,
			// 실시간 유효성 검사
			errorMsg: '',
			errors: {				
			},
			validationErrorMsg: {
				admin_password_confirm: '',
				admin_name: '',
			},

			// 가입 유저 차트
			barChartData: {
				labels: [
					'1월',
					'2월', 
					'3월', 
					'4월', 
					'5월', 
					'6월', 
					'7월', 
					'8월', 
					'9월', 
					'10월', 
					'11월', 
					'12월'
				],
				datasets: [{
						backgroundColor: [
									'#ff9999',
									'#ffcc99',
									'#ffff99',
									'#ccff99',
									'#99ff99',
									'#99ffcc',
									'#99ffff',
									'#99ccff',
									'#9999ff',
									'#cc99ff',
									'#ff99ff',
									'#ffccff',
								],
						data: []
					}]
			},
			// 차트 메소드 작성 및 데이터 넘어오는지 확인, 뷰 메소드 작성
        }
    },

    created() {		
		this.showAdminIndex = this.$route.path === '/admin/index';
		this.showAdminUserManagement = this.$route.path === '/admin/auth/user/management';
		this.showAdminAdminManagement = this.$route.path === '/admin/auth/management';
		this.showAdminRegistration = this.$route.path === '/admin/registration';

		if (this.showAdminIndex) {
			this.showAdminUserManagement = false;
			this.showAdminAdminManagement = false;
			this.showAdminRegistration = false;
		} else if(this.showAdminUserManagement) {
			this.showAdminIndex = false;
			this.showAdminAdminManagement = false;
			this.showAdminRegistration = false;
		} else if(this.showAdminAdminManagement) {
			this.showAdminIndex = false;
			this.showAdminUserManagement = false;
			this.showAdminRegistration = false;
		} else {
			this.showAdminIndex = false;
			this.showAdminUserManagement = false;
			this.showAdminAdminManagement = false;
		}

		this.userList();
		this.adminList();
		this.adminTotalUser();
	},

    mounted() {
		const adminFlg = localStorage.getItem('loginAdminFlg');
		// root Admin 접속
		if (adminFlg === '1') {
        this.isAdmin = true;
		this.loginAdminFlg = 'root';
		} else if (adminFlg === '2') {
			this.isAdmin = false;
			this.loginAdminFlg = 'sub';
		}

		this.loginAdminName = localStorage.getItem('loginAdminName');
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
			this.showAdminUserManagement = false;
			this.showAdminAdminManagement = false;
            this.showAdminRegistration = false;
        },

		showUserMenuManagement() {
			this.showAdminIndex = false;
			this.showAdminUserManagement = true;
			this.showAdminAdminManagement = false;
            this.showAdminRegistration = false;
		},

		showAdminMenuManagement() {
			this.showAdminIndex = false;
			this.showAdminUserManagement = false;
			this.showAdminAdminManagement = true;
            this.showAdminRegistration = false;
		},

		showAdminMenuRegistration() {
            this.showAdminIndex = false;
			this.showAdminUserManagement = false;
			this.showAdminAdminManagement = false;
            this.showAdminRegistration = true;
        },		

		userList() {
			const URL = '/admin/auth/user/management/ul';
			axios.get(URL)
			.then(response => {
				this.userAllList = response.data.data;
			})
			.catch(error => {
				alert(response.data.error);
			});
		},

		adminList() {
			const URL = '/admin/auth/management/al';
			axios.get(URL)
			.then(response => {
				this.adminAllList = response.data.data;
			})
			.catch(error => {
				alert(response.data.error);
			});
		},

		userWithdrawal(user_email) {
            const URL = '/admin/auth/user/management';            
            const formData = new FormData();
            formData.append('user_email', user_email);
            axios.post(URL, formData)
				.then(response => {                
					if(response.data.code === "uw00") {
						alert('계정이 탈퇴처리 되었습니다.');
						this.$router.push('/admin/index'); 
					} else {                
						alert(response.data.error);
					}
				})
				.catch(error => {                
					alert(response.data.error);
				});
        },

		adminWithdrawal(admin_number) {
            const URL = '/admin/auth/management/withdrawal';            
            const formData = new FormData();
            formData.append('admin_number', admin_number);	
			console.log(this.adminWithdrawalFormData);		
            axios.post(URL, formData)
				.then(response => {                
					if(response.data.code === "aw00") {
						alert('어드민계정이 탈퇴처리 되었습니다.');
						this.$router.push('/admin/index'); 
					} else {                
						alert(response.data.error);
					}
				})
				.catch(error => {                
					alert(response.data.error);
				});
        },

		adminRegister() {
			if (!(this.registerFormData.admin_number && this.registerFormData.admin_password
				&& this.registerFormData.admin_password_confirm && this.registerFormData.admin_name)) {
				this.errorMsg = '필수입력사항을 입력해주세요.';
				return;
			} else if (this.registerFormData.admin_flg === 'select') {
				this.errorMsg = '권한을 선택해주세요.';
				return;
			}	

            const URL = '/admin/registration';            
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
					this.errorMsg = error.response.data.error;
				});
        },

		adminUpdate(admin_number) {
            const URL = '/admin/auth/management/update';            
            const formData = new FormData();
            formData.append('admin_number', admin_number);

            axios.post(URL, formData)
				.then(response => {                
					if(response.data.code === "au00") {
						alert('권한이 변경되었습니다.');
						this.$router.push('/admin/index'); 
					} else {                
						alert(response.data.error);
					}
				})
				.catch(error => {                
					alert(response.data.error);
				});
        },

		adminLogout() {
			const URL = '/admin/logout';
			axios.get(URL)
			.then(response => {
				if(response.data.code === "al00") {
						localStorage.clear();
						alert('로그아웃 되었습니다.');
						this.$router.push('/admin'); 
					} else {                
						console.log("로그아웃 오류");
					}
			})
			.catch(error => {
				console.error('Unexpected error:', error);
			});
		},

		adminTotalUser() {
			const URL = '/admin/index/totalUserStat';
			axios.get(URL)
			.then(response => {
				this.totalRegisterUser = response.data.totalRegisterUser;
				this.totalTodayRegisterUser = response.data.totalTodayRegisterUser;
				this.totalSurveyResponseUser = response.data.totalSurveyResponseUser;				
			})
			.catch(error => {
				console.error(error);
			});
		},

		valAdminPasswordConfirm() {
			if(this.registerFormData.admin_password_confirm !== this.registerFormData.admin_password) {
				this.errors.admin_password_confirm = '비밀번호와 비밀번호 확인이 일치하지 않습니다';
			} else {
				this.errors.admin_password_confirm = '';
			}
		},
    }
}
</script>

<style lang="scss">
    @import '../../sass/Admin/admin_index.scss';
</style>