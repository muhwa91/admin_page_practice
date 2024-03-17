<template>
    <div class="border-box index_container">
        <div class="index_section">
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