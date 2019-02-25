<template>
    <div class="container">
        <div class="row chat-page">
            <div class="col-12 top text-center bg-dark text-light">
                <h2 class="mt-1 mb-1"><router-link to="/profile">Tiffany Trump</router-link></h2>
            </div>
            <div class="col-12 chat pl-0 pr-0 pb-3 m-0">
                <History ref="chatHistory"/>
            </div>
            <div class="col-12 input p-0">
                <textarea class="form-control border-success shadow-none" name="message"
                          ref="chatMessage" :rows="rows"
                          @keydown="inputHandler"
                          @keyup="updateRows"
                          placeholder="Write your message here..."></textarea>
            </div>
        </div>
    </div>
</template>

<script>
    import History from './History';
    import axios from 'axios';

    export default {
        name: 'chat',
        data() {
            return {
                rows: 1
            }
        },
        components: {
            History
        },
        methods: {
            updateRows() {
                let message = this.$refs.chatMessage.value;
                let lines = message.split(/\r*\n/).length;
                this.rows = lines === 0 ? 1 : lines > 5 ? 5 : lines;
            },
            inputHandler(e) {
                if (e.keyCode === 13 && !e.shiftKey) {
                    e.preventDefault();
                    this.sendMessage();
                }
            },
            sendMessage() {
                let message = this.$refs.chatMessage.value;
                axios
                    .post('/api/message', { message })
                    .then(response => {
                        console.log('Message:', message);
                        if (response.hasOwnProperty('data')) {
                            this.$refs.chatHistory.updateMessages();
                        }
                        console.log(response.data);
                        this.$refs.chatMessage.value = '';
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        }
    }
</script>