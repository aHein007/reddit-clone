<template>
    <guest-layout>
        <div class="flex justify-end m-2 p-2">
            <Link :href="route('communities.post.create',community.slug)" v-if="$page.props.auth.auth_check" class="bg-indigo-500 px-2 py-2 rounded text-white">Create Post</Link>
        </div>
        <h1>This subreddit name is {{ community.slug }}</h1>
    </guest-layout>
</template>

<script setup>
import GuestLayout from '../../../Layouts/GuestLayout.vue'
import {Link} from '@inertiajs/vue3'
defineProps({
    community:Object()
})
</script>

<style>

</style>
