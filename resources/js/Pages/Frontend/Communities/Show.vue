<template>
    <GuestLayout>
        <div class="flex justify-between">
            <div class=" mt-3" >
                hi {{ community.name }}
            </div>
            <Link :href="route('communities.post.create',community.slug)" v-if="$page.props.auth.auth_check" class="px-3 py-4 rounded bg-indigo-500">Create Post</Link>

        </div>
    </GuestLayout>

</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue"
import { Link } from "@inertiajs/inertia-vue3";


defineProps({
    community:Object
})
</script>

<style>

</style>
