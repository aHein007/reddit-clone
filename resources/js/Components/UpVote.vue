<template>
    <Link method="post" type="button" as="button" :href="route('posts.upVote',slug)" class="text-xs hover:text-blue-700" preserve-scroll >
        <svg class="w-5 fill-current text-grey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
             <path d="M7 10v8h6v-8h5l-8-8-8 8h5z" />
        </svg>
    </Link>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'

defineProps({
    slug:String
})
</script>

<style lang="scss" scoped>

</style>
