<template>
    <div class="container-fluid p-0" :style="{ backgroundColor: bgColor }">
        <nprogress-container></nprogress-container>

        <router-view></router-view>
    </div>
</template>

<script>
    import NprogressContainer from 'vue-nprogress/src/NprogressContainer';

    export default {
        name: 'app',
        components: {
            NprogressContainer
        },
        data() {
            return {
                btnClicked: false
            }
        },
        computed: {
            bgColor() {
                return this.btnClicked ? '#038eff' : '#ffffff';
            }
        },
        methods: {},
        mounted() {
            this.$root.$on('swapColors', () => {
                this.btnClicked = !this.btnClicked;
            });
        }
    }
</script>