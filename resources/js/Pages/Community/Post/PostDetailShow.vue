<template>
    <guest-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">r/{{ community.name }}</h2>
        </template>
        <div class="flex justify-end m-2 p-2">
            <Link :href="route('communities.post.create',community.slug)" v-if="$page.props.auth.auth_check" class="bg-indigo-500 px-2 py-2 rounded text-white">Create Post</Link>
        </div>
        <div class="flex bg-blue-lightest  flex-col font-sans min-h-screen">

  <section class="flex md:flex-row">
    <div class="w-8/12">

        <div>
            <Pagination :links="posts.meta.links"></Pagination>
            <!-- you need to use (link) when you use the Pagination as a component-->
        </div>
    </div>
    <div class="w-4/12">
        <div class="p-2 m-2">
            <div class=" bg-slate-500 p-2 text-white">Last Community</div>
        </div>
    </div>
  </section>
</div>
    </guest-layout>
</template>

<script setup>
import GuestLayout from '../../../Layouts/GuestLayout.vue'
import Pagination from '../../../Components/Pagination.vue'
import {Link} from '@inertiajs/vue3'
defineProps({
    community:Object,
    posts :Object
})
</script>

<style>

</style>
