<template>
    <div v-if="!['/admin', '/admin/index'].includes($route.fullPath)">
        <div class="header_container">
            <div class="header_section">
                <div class="header_index_area">
                    <a class="text-3xl font-bold header_index_a" href="#">BOOKPICK'</a>
                </div>
                <div class="header_login_area">
                    <a class="font-semibold text-center header_menu_a" href="#">대시보드</a>
                    <a class="font-semibold text-center header_menu_a" href="#">문의</a>
                    <a class="font-semibold text-center header_login_a" href="#">로그인</a>
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
        }
    },

    created() {},

    mounted() {},

    methods: {

    }
}
</script>
<style lang="scss">
	@import '../../sass/Layout/header.scss';
</style>