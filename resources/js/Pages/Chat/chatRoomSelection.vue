<template>
    <div class="flex justify-between items-baseline">
        <div>
            {{ selected.name }} Chat
        </div>
        <div>
            <select
                v-model="selected"
                @change="$emit('roomChanged', selected)"
                class="input">
                <option
                    :key="room.id"
                    v-for="room in rooms"
                    :value="room">
                    {{ room.name }}
                </option>
            </select>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'rooms', 'currentRoom'
        ],
        data() {
            return {
                selected: ''
            }
        },
        created() {
            this.selected = this.currentRoom;
        }

    }
</script>

<style scoped>

</style>
