<template>
    <div v-if="!['/admin', '/admin/index'].includes($route.fullPath)">
        <hr>
        <div class="footer_container">
            <div class="footer_section">                
                <div class="footer_p_area">
                    <p class="text-xl font-semibold footer_p_title">북픽 BOOKPICK'</p>
                    <p class="footer_p_content">사업자등록번호 : 880-86-02354 | 주식회사 샌드버그 대표이사 : 배호진</p>
                    <p class="footer_p_content">012345 부산광역시 남구 전포대로 133, wework BIFC 14층, 116호</p>
                    <p class="footer_p_content">고객센터 : 1500-1234 | 이메일 : contact@sandburg.co.kr</p>
                </div>
                <div class="footer_a_area">
                    <a class="footer_a" href="#">서비스 이용약관</a>
                    <a class="font-semibold footer_a" href="#">개인정보 처리방침</a>
                    <a class="footer_a" href="#">고객지원</a>
                    <a class="footer_a" href="#">제휴문의</a>
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
	@import '../../sass/Layout/footer.scss';
</style>