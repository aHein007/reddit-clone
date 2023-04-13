<template>
    <div class="flex">

        <template v-for="link in links"  :key="link.id">
             <div class="m-3 border rounded bg-slate-300 px-3 py-2 hover:bg-slate-500">
                <div class=" " v-if="link.url == null"  v-html="link.label"></div>
                <Link v-else :href="link.url"  >
                    <div class="px-3 rounded w-full" :class="{ 'bg-indigo-400': link.active }" v-html="link.label"></div>
                </Link>
             </div>
        </template>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3"

defineProps({
    links:Array
})
</script>

<style>

</style>
