<template>
    <ul role="list" class=" divide-y divide-slate-300 dark:divide-slate-300 bg-white text-slate-400 rounded-md shadow-md">
          <slot>
             <h2 class=" font-semibold bg-blue-700 p-3 rounded-t-md text-white">Popular Posts </h2>
          </slot>
         <li v-for='post in posts' :key="post.id" class="py-3 sm:py-4 p-4">
         <div class="flex items-center space-x-4">
             <Link :href="route('frontend.post.show',[community.slug,post.slug])" class="text-slate-800 dark:text-slate-400 font-semibold truncate text-sm">
                 {{ post.title }}

             </Link>
             <div class="">
                post({{ post.vote }})
                this is post list
             </div>
         </div>
     </li>
    </ul>

 </template>

 <script setup>
 import {Link} from "@inertiajs/vue3"

 defineProps({
    posts:Object,
    community:Object

 })
 </script>

 <style lang="scss" scoped>

 </style>
