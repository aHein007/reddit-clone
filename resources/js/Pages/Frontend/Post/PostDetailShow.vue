<template>
    <guest-layout>



  <section class="flex flex-col md:flex-row">
    <div class="w-full md:w-8/12">
        <div class="m-2 p-2 bg-white">
            <h2 class=" font-semibold text-2xl text-black">
                <Link :href="route('frontend.communities.show',communitySlug.slug)">r/{{ communitySlug.name }}</Link>
            </h2>
        </div>
        <div class="m-2 p-2 bg-white flex justify-between">
            <div class="">
                <span class=" text-slate-500 text-sm m-2">Posted By </span><span class=" font-semibold text-sm">{{ postSlug.data.username }}</span>
               <div class="p-2">
                <div class="text-3xl font-semibold text-black">{{ postSlug.data.title }}</div>
                <div class=" text-slate-700 my-2">{{ postSlug.data.description }}</div>
                <a :href=" postSlug.data.url" class="text-blue-500 hover:text-blue-300">{{ postSlug.data.url }}</a>
               </div>
            </div>

            <div class="m-2" v-if="$page.props.auth.auth_check && postSlug.data.owner">
                <Link :href="route('communities.post.edit',[communitySlug.slug,postSlug.data.slug])" class=" text-sm font-semibold rounded-md py-2 px-4 me-2 bg-blue-500 text-white hover:bg-blue-300">Edit</Link>
                <Link :href="route('communities.post.destroy',[communitySlug.slug,postSlug.data.slug])" method="delete" as="button" type="button" class="text-sm font-semibold rounded-md py-2 px-4 me-2 bg-red-500 text-white hover:bg-red-300">Delete</Link>
            </div>
        </div>
    </div>
    <div class="w-full md:w-4/12 p-4">
        <div class="p-2 m-2">
            <div class=" bg-slate-500 p-2 text-white">Last Community</div>
        </div>
    </div>
  </section>

    </guest-layout>
</template>

<script setup>
import GuestLayout from '../../../Layouts/GuestLayout.vue'
import Pagination from '../../../Components/Pagination.vue'
import {Link} from '@inertiajs/vue3'
defineProps({
    communitySlug:Object,
    postSlug :Object
})
</script>

<style>

</style>
