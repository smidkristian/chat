<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Chat
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div :key="chatRoom.id" v-for="chatRoom in chatRooms">
                    <ul>
                        <li>
                            {{chatRoom.name}}
                        </li>
                    </ul>
                </div>
                <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                    <message-container class="p-4" />
                    <input-message :room="currentRoom" class="p-4" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import MessageContainer from './messageContainer.vue'
    import InputMessage from './inputMessage.vue'

    export default {
        components: {
            AppLayout,
            MessageContainer,
            InputMessage,
        },

        data() {
            return {
                chatRooms: [],
                currentRoom: [],
                messages: []
            }
        },

        mounted() {
            this.getRooms();
            this.getMessages();
        },

        methods: {
            getRooms() {
                axios.get(route('rooms')).then( response => {
                    this.chatRooms = response.data;
                    this.setRoom( response.data[0]);
                })
                .catch( error => {
                    console.log(error);
                });
            },
            setRoom( room ) {
                this.currentRoom = room;
            },
            getMessages() {
                axios.get('chat/room/' + this.currentRoom.id + '/messages')
                .then( response => {
                    this.messages = response.data;
                })
                .catch (error => {
                    console.log(error);
                })
            }
        }
    }
</script>
