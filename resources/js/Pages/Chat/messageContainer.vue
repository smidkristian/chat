<template>
    <div>
        <div :key="message.id" v-for="message in messages">
            <message-item :message="message"/>
        </div>
    </div>
</template>

<script>
import messageItem from './messageItem.vue'
    export default {
        components: {
            messageItem
        },
        props: [
            'messages'
        ]
    }
</script>

<style scoped>

</style>
