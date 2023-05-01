<template>
    <div class="w-1/12 flex justify-center  flex-col text-center pt-2 bg-slate-200 mr-2 rounded">
        <UpVote :slug="post.slug" class=" flex justify-center" :class="{'text-blue-600' : post.postVotes[0]  && post.postVotes[0].vote === 1}"></UpVote>
            <span class="text-xs font-semibold flex justify-center my-1 pt-5 pb-5" >{{ post.vote }}</span>
        <DownVote :slug="post.slug" class=" flex justify-center" :class="{'text-red-600' : post.postVotes[0] && post.postVotes[0].vote === -1}"></DownVote>
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
