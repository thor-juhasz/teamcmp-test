<template>
    <div class="container-fluid p-0" :style="{ backgroundColor: bgColor }">
        <nprogress-container></nprogress-container>

        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <router-link class="navbar-brand" to="/">Home</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <router-link class="nav-item" tag="li" to="/profile" active-class="active">
                        <a class="nav-link">Profile 2</a>
                    </router-link>
                    <router-link class="nav-item" tag="li" to="/chat" active-class="active">
                        <a class="nav-link">Chat 2</a>
                    </router-link>
                </ul>
            </div>
        </nav>

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