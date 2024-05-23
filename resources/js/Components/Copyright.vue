<script setup>
    const props = defineProps({
        link: String,
        name: String
    });
</script>

<template>
    <span class="block text-md text-center mt-9 mb-4 text-carbon-200 font-light">
        © {{new Date().getFullYear()}} <a class="link" :href="link" target="_blank">{{name}}</a>. All rights reserved.
    </span>
</template>
