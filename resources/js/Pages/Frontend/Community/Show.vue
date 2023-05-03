<template>
    <guest-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">r/{{ community.name }}</h2>
        </template>
        <div class="flex justify-end m-2 p-2">
            <Link :href="route('communities.post.create',community.slug)" v-if="$page.props.auth.auth_check" class="bg-indigo-500 px-2 py-2 rounded text-white">Create Post</Link>
        </div>
        <div class="flex bg-blue-lightest  flex-col font-sans min-h-screen">

  <section class="flex flex-col md:flex-row">
    <div class="w-full md:w-8/12">
        <PostCard  v-for="post in posts.data" :communityName="community.slug" :post="post" :key="post" ></PostCard>
        <div>
            <Pagination :links="posts.meta.links"></Pagination>
            <!-- you need to use (link) when you use the Pagination as a component-->
        </div>
    </div>
    <div class="w-full md:w-4/12">
        <div class="bg-white m-3 rounded-md  shadow-md">
            <h2 class="bg-blue-700 rounded-t-md p-2 text-white  font-semibold ">About {{ community.name }}</h2>
            <div class="p-2 text-slate-500">
                {{ community.description }}
            </div>
       </div>

       <div class="m-3">
            <CommunityList :communities="communities.data">
                <slot>
                    <h2 class=" font-semibold bg-blue-700 p-3 rounded-t-md text-white">Latest Community</h2>
                </slot>
            </CommunityList>
       </div>
    </div>
  </section>
</div>
    </guest-layout>
</template>

<script setup>
import GuestLayout from '../../../Layouts/GuestLayout.vue'
import PostCard from '../../../Components/PostCard.vue'
import Pagination from '../../../Components/Pagination.vue'
import {Link} from '@inertiajs/vue3'
import CommunityList from '@/Components/CommunityList.vue'
defineProps({
    community:Object,
    posts :Object,
    communities:Object
})
</script>

<style>

</style>
