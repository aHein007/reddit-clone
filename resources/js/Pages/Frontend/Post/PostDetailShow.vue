<template>
    <guest-layout>
    <section class="flex flex-col md:flex-row">
    <div class="w-full md:w-8/12">
        <div class="m-2 p-2 bg-white">
            <h2 class=" font-semibold text-2xl text-black">
                <Link :href="route('frontend.communities.show',communitySlug.slug)">r/{{ communitySlug.name }}</Link>
            </h2>
        </div>
        <div class="m-2 p-2 flex bg-white ">

               <PostVote class="text-black" :post="post.data"></PostVote>

            <div class="w-full" >

                <span class=" text-slate-500 text-sm m-2">Posted By </span><span class=" font-semibold text-sm">{{ post.data.username }}</span>

            <span class="m-2 float-right" style="height:30px" v-if="$page.props.auth.auth_check && post.data.owner">
                <Link :href="route('communities.post.edit',[communitySlug.slug,post.data.slug])" class="  text-sm font-semibold m-auto rounded-md p-2 px-4 me-2 bg-blue-500 text-white hover:bg-blue-300">Edit</Link>
                <Link :href="route('communities.post.destroy',[communitySlug.slug,post.data.slug])" method="delete" as="button" type="button" class="text-sm m-auto font-semibold rounded-md p-2 px-4 me-2 bg-red-500 text-white hover:bg-red-300">Delete</Link>
            </span>

               <div class="p-2 ">
                <div class="text-3xl font-semibold text-black">{{ post.data.title }}</div>
                <div class=" text-slate-700 my-2">{{ post.data.description }}</div>
                <a :href=" post.data.url" class="text-blue-500 hover:text-blue-300">{{ post.data.url }}</a>
               </div>

               <div class=" border-b-2 m-3 border-gray-200 w-full"></div>
               <div class="">
                <ul v-for="comment in post.data.comments" :key="comment" role="list" class=" divide-y divide-gray-200 m-2 p-2">

                    <li class="py-4 flex flex-col border rounded bg-slate-300 max-w-sm p-4">
                        <div class="text-sm text-slate-700">Commented By<span class="font-semibold ml-1">{{ comment.username }}</span></div>
                        <div class="text-slate-600">{{ comment.content }}</div>
                    </li>

                </ul>
               </div>
               <div class="" v-if="$page.props.auth.auth_check">
                <form @submit.prevent="submit">
                <div class="p-2 max-w-md">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Your message</label>
                    <textarea v-model="form.content" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:bg-gray-200 dark:border-gray-200 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                    <button class="mt-2 p-2 text-sm text-white bg-blue-500 rounded">Comment</button>
                </div></form>
               </div>
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
import PostVote from '../../../Components/PostVote.vue'
import {Link, useForm} from '@inertiajs/vue3'
let props = defineProps({
    communitySlug:Object,

    post:Object
})

const form =useForm({
    content : ""
})

const submit =() =>{
    form.post(route('frontend.post.store',[props.communitySlug.slug,props.post.data.slug]),{
        onSuccess:() => form.reset('content') // this is form clean when typing is done
    });

}
</script>

<style>

</style>
