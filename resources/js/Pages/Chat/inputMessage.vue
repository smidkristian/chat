<template>
    <div class="flex justify-between items-baseline">
        <input
            type="text"
            v-model="message"
            @keyup.enter="sendMessage()"
            placeholder="Say something..."
            class="bg-trasparent w-full mr-4 rounded-md border-none focus:ring-0"
        />
        <button
            @click="sendMessage()"
            class="btn">
            Send
        </button>
    </div>
</template>

<script>
    export default {
        props: [
            'room'
        ],
        data() {
            return {
                message: '',
            }
        },
        methods: {
            sendMessage() {
                if ( this.message == ' ' ) {
                    return;
                }

                axios.post('chat/room/' + this.room.id + '/message', {
                    message: this.message
                })
                .then( response => {
                    if ( response.status = 201 ) {
                        this.message = '';
                        this.$emit('messageSent');
                    }
                })
                .catch( error => {
                    console.log(error);
                })
            }
        }

    }
</script>

<style scoped>

</style>
