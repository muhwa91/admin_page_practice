<template>
    <!-- <div v-if="!['/admin', '/admin/index', '/admin/registration', '/admin/auth/user/management'].includes($route.fullPath)"> -->
    <div v-if="!$route.fullPath.startsWith('/admin')">
        <div class="header_container">
            <div class="header_section">
                <div class="header_index_area">
                    <router-link to="/" class="text-3xl font-bold header_index_a">BOOKPICK'</router-link>
                </div>
                <div class="header_login_area">
                    <a class="font-semibold text-center header_menu_a" href="#">문의</a>
                    <router-link v-if="isLogin" @click="userLogout" class="font-semibold text-center header_login_a">로그아웃</router-link>
                    <router-link v-else to="/login" class="font-semibold text-center header_login_a">로그인</router-link>           
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
        }
    },

    created() {
        
    },

    mounted() {

    },

    methods: {
        // userLogout() {       
        //     const URL = '/logout'
        //     axios.get(URL)
        //         .then(response => {
        //             if(response.data.code === "ul00") {
		// 				localStorage.removeItem('loginUserData');
        //                 this.isLogin = false;
        //                 this.$router.push('/');
		// 			} else {                
		// 				console.log(response.data.error);
		// 			}
        //         })
        //         .catch(error => {
        //             console.error('로그아웃 요청 중 오류 발생:', error);
        //         });
        // }
    }
}
</script>
<style lang="scss">
	@import '../../sass/Layout/header.scss';
</style>