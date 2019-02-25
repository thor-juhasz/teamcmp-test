<template>
    <div class="container-fluid">
        <div class="row chat-page">
            <div class="col-12 top text-center bg-dark text-light">
                <h2 class="mt-1 mb-1"><router-link to="/profile">Tiffany Trump</router-link></h2>
            </div>
            <div class="col-12 chat pl-0 pr-0 pb-3 m-0">
                <History/>
            </div>
            <div class="col-12 input p-0">
                <input type="text" class="form-control w-100" placeholder="Write your message here...">
            </div>
        </div>
    </div>
</template>

<script>
    import History from './History';

    export default {
        name: 'chat',
        components: {
            History
        }
    }
</script>