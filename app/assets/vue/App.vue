<template>
    <div class="container">
        <nprogress-container></nprogress-container>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
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

        <div class="test">test text</div>

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
    }
</script>