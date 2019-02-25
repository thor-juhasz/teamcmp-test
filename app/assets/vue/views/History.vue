<template>
    <div class="container-fluid history d-flex flex-column">
        <Message v-for="message in allMessages" :key="message.id" :type="message.type" :message="message.message"/>
    </div>
</template>

<script>
    import Message from './Message';
    import axios from 'axios';

    export default {
        name: 'history',
        components: {
            Message
        },
        computed: {
            allMessages() {
                return this.messages;
            }
        },
        data() {
            return {
                messages: []
            };
        },
        methods: {
            updateMessages() {
                axios
                    .get('/api/messages/')
                    .then(response => {
                        if (response.hasOwnProperty('data')) {
                            this.messages = response.data;
                        }
                        console.log(response.data)
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        },
        mounted() {
            this.updateMessages();
        }
    }
</script>