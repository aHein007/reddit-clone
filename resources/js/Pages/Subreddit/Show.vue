<template>
    <h1>This subreddit name is {{ subreddit.slug }}</h1>
</template>

<script setup>
defineProps({
    subreddit:Array
})
</script>

<style>

</style>
