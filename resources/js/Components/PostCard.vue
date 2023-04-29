<template>
    <div class="">
    <div class="container mx-auto">
      <div class="flex w-960 md:w-full">
        <div class="w-full   mx-auto">

          <div class="py-2 ">
            <div class="flex border border-grey-light-alt hover:border-grey rounded bg-white cursor-pointer p-10 shadow-md">
                <PostVote :post="post"/>
              <div class="w-full md:w-11/12 pt-2">
                <div class="flex items-center text-xs mb-2">
                  <a href="#" class="font-semibold no-underline hover:underline text-black flex items-center">
                    <img class="rounded-full border h-5 w-5" src="https://avatars0.githubusercontent.com/u/30317862?s=200&v=4">
                    <span class="ml-2">r/{{ communityName }}</span>
                  </a>
                  <span class="text-grey-light mx-1 text-xxs">•</span>
                  <span class="text-grey">Posted by</span>
                  <a href="#" class="text-grey mx-1  no-underline hover:underline">{{ post.username }}</a>
                  <span class="text-grey">2 hours ago</span>
                </div>
                <div class="my-2">
                  <h2 class="text-lg font-medium mb-1 mt-5">{{ post.title }}</h2>
                  <div class="text-sm text-slate-500">{{ cutString }} .....</div>
                </div>
                <div class="inline-flex items-center my-1 mt-2">
                  <div class="flex hover:bg-grey-lighter p-1">
                    <svg class="w-4 fill-current text-grey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path d="M10 15l-4 4v-4H2a2 2 0 0 1-2-2V3c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-8zM5 7v2h2V7H5zm4 0v2h2V7H9zm4 0v2h2V7h-2z" />
                    </svg>
                    <span class="ml-2 text-xs font-semibold text-grey"> Comments ({{ post.comments_count }})</span>
                  </div>
                  <div class="flex hover:bg-grey-lighter p-1 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current text-grey" viewBox="0 0 576 512">
                        <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                    </svg>
                    <Link :href="route('frontend.post.show',[communityName,post.slug])" class="ml-2 text-xs font-semibold text-grey">Read More</Link>
                  </div>
                  <div class="flex hover:bg-grey-lighter p-1 ml-2">
                    <svg class="w-4 fill-current text-grey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path d="M0 2C0 .9.9 0 2 0h14l4 4v14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5 0v6h10V2H5zm6 1h3v4h-3V3z" />
                    </svg>
                    <span class="ml-2 text-xs font-semibold text-grey">Save</span>
                  </div>
                  <div class="flex hover:bg-grey-lighter p-1 ml-2 rotate-90">
                    <svg class="w-4 fill-current text-grey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path d="M10 12a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0-6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 12a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" />
                    </svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'
import { computed } from 'vue'
import PostVote from '../Components/PostVote.vue'
let props = defineProps({
    post:Object,
    communityName:String
})

let cutString =computed(()=>{
  return  props.post.description = props.post.description.slice(0 , 400)
})
</script>

<style lang="stylus" scoped>

</style>
