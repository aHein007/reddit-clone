<template>
  <div class="flex">
    <div  v-for="(link,key) in links " :key="key" >
        <div v-if="link.url == null" v-html="link.label" class="px-2 py-3 border border-gray-400 rounded text-gray-800 flex justify-evenly mx-2 cursor-pointer hover:bg-gray-200"></div><!-- why v-if() ? because first page in the url is will be null so -->
        <Link v-else :href="link.url" :class="{'bg-indigo-500':link.active ==true}" v-html="link.label" class="px-4 py-3 border border-gray-400 rounded text-gray-800 flex justify-evenly mx-2 cursor-pointer hover:bg-gray-200 "></Link> <!-- this :class is for link.active-->
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';


defineProps({
    links:Object
});



</script>

<style>

</style>
