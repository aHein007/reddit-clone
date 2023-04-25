<template>
    <div class="w-1/12 flex flex-col text-center pt-2">
        <UpVote :slug="post.slug" :class="{'text-blue-600' : post.postVotes[0]  && post.postVotes[0].vote === 1}"></UpVote>
            <span class="text-xs font-semibold my-1 mr-8">{{ post.vote }}</span>
        <DownVote :slug="post.slug" :class="{'text-red-600' : post.postVotes[0] && post.postVotes[0].vote === -1}"></DownVote>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import UpVote from '../Components/UpVote.vue';
import DownVote from '../Components/DownVote.vue'
defineProps({
    post:Object
})
</script>

<style lang="scss" scoped>

</style>
