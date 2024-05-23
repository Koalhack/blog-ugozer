<script setup>
    import PostCardList from '../Components/PostCardList.vue';

    import axios from 'axios';
    import {ref, watch, onMounted} from 'vue';
    import {useRoute} from 'vue-router';

    const route = useRoute();
    const response = ref();

    async function getPost() {
        try {
            response.value = await axios.get(`/api/posts/${route.query.category || ''}`);
        } catch (error) {
            console.log("error post not found: ", error);
        }
    }

    getPost();
    watch(() => route.query.category, getPost);

</script>

<template>
    <main class="container pt-[150px]">
        <router-link to="/test" >Take me to Test page</router-link>
        <section>
            <PostCardList :list="response?.data?.data" />
        </section>
    </main>
</template>
