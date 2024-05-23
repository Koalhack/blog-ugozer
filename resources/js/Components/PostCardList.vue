<script setup>
import PostCard from './PostCard.vue';

const props = defineProps({
    list: Object
});

</script>

<template>
    <ul v-if="list" class="grid grid-cols-2 gap-4 lg:gap-8">
        <li v-for="item in list" :key="item?.id">
            <PostCard :id="item?.id" :slug="item?.slug" :title="item?.title || 'title'" :category="item?.category_name || 'null'" :image_name="item?.image_name" :image_path="item?.image_path || 'https://placehold.co/600x400/000000/FFFFFF'" />
        </li>
    </ul>
</template>
