<template>
    <div class="container-fluid history d-flex flex-column">
        <Message :key="0" type="received" message="Hi there! How are you?"/>
        <Message v-for="message in messages" :key="message.id"/>
    </div>
</template>

<script>
    import Message from './Message';

    export default {
        name: 'history',
        components: {
            Message
        },
        data() {
            return {
                messages: []
            };
        }
    }
</script>