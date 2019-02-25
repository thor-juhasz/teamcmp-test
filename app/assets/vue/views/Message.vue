<template>
    <div class="message-container">
        <div class="message-icon-left">
            <div v-if="isSent" :style="{ backgroundImage: 'url(' + senderImage + ')' }"></div>
        </div>
        <div class="message-text" :class="messageBg">
            <div class="arrow">&nbsp;</div>
            <span>{{ message }}</span>
        </div>
        <div class="message-icon-right">
            <router-link to="/profile">
                <div v-if="isReceived" :style="{ backgroundImage: 'url(' + receivedImage + ')' }"></div>
            </router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'message',
        data() {
            return {
            }
        },
        props: {
            type: String,
            message: String
        },
        computed: {
            isSent() {
                return this.type === 'sent';
            },
            isReceived() {
                return this.type === 'received';
            },
            messageBg() {
                return this.type === 'received' ? 'bg-info' : 'bg-light2';
            },
            senderImage() {
                return '/images/anon.jpg';
            },
            receivedImage() {
                return '/images/profile.jpg';
            }
        }
    }
</script>