<script setup>
    //INFO: Utils
    import { capitalizeFirstLetter } from '../Utils/function.js';
       const props = defineProps({
           id: Number,
           slug: String,
           image_path: String,
           image_name: String,
           title: String,
           category: String
       });
</script>

<template>
    <router-link :to="'/post/' + slug + '/' + id " class=" group flex flex-col justify-center">
        <figure>
            <img
                class="w-full mx-auto object-cover rounded-md transition-colors duration-200 ease-linear border border-carbon-300 group-hover:border-carbon-200"
                :src="image_path"
                :alt="image_name"
                loading="lazy"
            />
        </figure>
        <div class="text-center mt-3">
            <span class="block text-lg md:text-xl">{{title}}</span>
            <span class="block mt-1 text-sm md:text-md text-carbon-200">{{capitalizeFirstLetter(category)}}</span>
        </div>
    </router-link>
</template>
