<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 top text-center bg-dark text-light">
                <h2 class="mt-1 mb-1"><router-link to="/chat">User name</router-link></h2>
            </div>
            <div class="col-12 img text-center pt-3 pb-3">
                <router-link to="/chat">
                    <i class="fas fa-female fa-8x"></i>
                </router-link>
            </div>
            <div class="col-12 info">
                <h3 class="mb-0"><i class="fas fa-circle green" data-fa-transform="shrink-10"></i>User name, 25</h3>
                <p class="text-muted small">Silicon Valley</p>
                <p class="small">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nisi quam, consectetur eu enim quis, fermentum feugiat nisl. Aenean sodales, ex eget vehicula mattis, mauris felis consequat dolor, et facilisis ipsum ligula quis lacus. Sed vel tempus tellus. Praesent tristique eget nunc eu egestas. Duis eget est et erat bibendum rhoncus. Nulla accumsan euismod eleifend.</p>
            </div>
            <div class="col-12 pb-3">
                <button class="btn btn-lg w-100" :class="[ btnClicked ? 'btn-success' : 'btn-dark']" @click="colorSwap()">
                    Add as friend
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'profile',
        data() {
            return {
            }
        },
        computed: {
            btnClicked() {
                return this.$parent.btnClicked;
            }
        },
        methods: {
            colorSwap() {
                this.$root.$emit('swapColors');
            }
        }
    }
</script>