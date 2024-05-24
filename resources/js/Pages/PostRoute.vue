<script setup>
    //INFO: Dependencies
    import axios from 'axios';
    import {ref} from 'vue';
    import {useRoute} from 'vue-router';

    //INFO: Utils
    import {capitalizeFirstLetter, formatLaravelDate} from '../Utils/function.js';

    const route = useRoute();
    const response = ref();

    async function getPost() {
        try {
            response.value = await axios.get(`/api/post/${route.params.id}`);
            response.value = response.value?.data?.data;
        } catch (error) {
            console.error("error: ", error);
        }
    }

    getPost();
</script>

<template>
    <main class="max-w-3xl mx-auto pt-[150px]">
        <article v-if="response">
            <figure >
                <img
                    class="w-full object-cover rounded-lg border border-carbon-300"
                    :src="response?.image_path ? `/storage/${response?.image_path}` : 'https://placehold.co/600x400/000000/FFFFFF'"
                    :alt="response?.image_name || 'thumbnail'">
            </figure>
            <h1
                class="mt-8 text-5xl font-bold"
            >
                {{response?.title}}
            </h1>
            <div class="flex justify-between mt-3">
                <span class="block text-xl text-carbon-100">{{capitalizeFirstLetter(String(response?.category_name))}}</span>
                <div class="flex gap-x-3 font-light text-md text-carbon-200">
                     <span class="block">Created: {{formatLaravelDate(response?.created_at)}}</span>
                     <span class="block">Modified: {{formatLaravelDate(response?.updated_at)}}</span>
                </div>
            </div>
            <hr class="border-t border-carbon-900 my-4" />
            <p class="text-lg">{{response?.content}}</p>
        </article>
    </main>
</template>
