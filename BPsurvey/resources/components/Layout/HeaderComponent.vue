<template>
    <div v-if="$route && $route.path !== '/admin' && $route.path !== '/admin/index' && $route.path !== '/admin/auth/user/management' && $route.path !== '/admin/auth/management' && $route.path !== '/admin/registration' && $route.path !== '/admin/question'">
        <div class="header_container">
            <div class="header_section">
                <div class="header_index_area">
                    <router-link to="/" class="text-3xl font-bold header_index_a">BOOKPICK'</router-link>
                </div>
                <div class="header_login_area">
                    <a class="font-semibold text-center header_menu_a" href="#">문의</a>
                    <router-link to="/login" class="font-semibold text-center header_login_a" v-if="!isLogin">로그인</router-link>           
                    <a class="font-semibold text-center header_login_a" href="/" @click="userLogout" v-if="isLogin">로그아웃</a>
                </div>
            </div>            
        </div>
    </div>    
</template>
<script>
export default {
    name: '',
    props: {

    },
    
    components: {

    },

    data() {
        return {
            setting: '',
            isLogin: false,
            loginUserData: false,
        }
    },

    created() {
        
    },

    mounted() {
        
    },
    
    updated() {
        const loginUserData = localStorage.getItem('loginUserData');
        console.log(loginUserData);
		if (loginUserData) {
        this.isLogin = true;
		} else {
			this.isLogin = false;
		}
    },

    methods: {
        userLogout() {       
            const URL = '/logout'
            axios.get(URL)
                .then(response => {
                    if(response.data.code === "ul00") {
						localStorage.clear();
                        this.isLogin = false;
                        this.$router.push('/');
					} else {                
						console.log(response.data.error);
					}
                })
                .catch(error => {
                    console.error('로그아웃 요청 중 오류 발생:', error);
                });
        }
    }
}
</script>
<style lang="scss">
	@import '../../sass/Layout/header.scss';
</style>