<template>
    <div class="border-box index_container">
        <div class="index_section">
            <p class="mb-2 text-2xl text-center">로그인 후 만족도 조사에 참여해주세요!</p>
            <router-link to="/survey"><img src="../../public/images/Index.jpg" alt=""></router-link> 
        </div>    
    </div>
</template>
<script>
export default {
    name: 'IndexComponent',
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
    @import '../sass/index.scss';
</style>