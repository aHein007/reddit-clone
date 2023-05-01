<template>
    <guest-layout>

        <div class="flex bg-blue-lightest  flex-col font-sans min-h-screen">

  <section class="flex flex-col md:flex-row">
    <div class="w-full md:w-8/12">
        <PostCard  v-for="post in posts.data" :communityName="post.community_slug" :post="post" :key="post" ></PostCard>

    </div>
    <div class="w-full md:w-4/12">
        <div class="p-2 m-2">
            <div class="  p-2 ">Top Community</div>
            <CommunityList :communities="communities.data"></CommunityList>
        </div>
    </div>
  </section>
</div>
    </guest-layout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import PostCard from '@/Components/PostCard.vue'
import CommunityList from '@/Components/CommunityList.vue'
defineProps({
    communities:Object,
    posts:Object
})
</script>

<style>

</style>
