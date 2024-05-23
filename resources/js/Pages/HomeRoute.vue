<script setup>
    import PostCardList from '../Components/PostCardList.vue';
    import Pagination from '../Components/Pagination.vue';

    import axios from 'axios';
    import {ref, watch, onMounted} from 'vue';
    import {useRoute} from 'vue-router';

    const route = useRoute();
    const response = ref();
    const activePage = ref(1);

    async function getPosts() {
        try {
            response.value = await axios.get(`/api/posts/${route.query.category || ''}?page=${activePage.value}`);
        } catch (error) {
            console.log("error post not found: ", error);
        }
    }

    getPosts();
    watch(() => route.query.category, () => {
        getPosts();
        activePage.value = 1;
    });
    watch(activePage, getPosts);

</script>

<template>
    <main class="container pt-[150px]">
        <section>
            <PostCardList :list="response?.data?.data" />
        </section>
    </main>
    <footer>
        <Pagination @page="(page) => activePage = page" :activePage="response?.data?.meta?.current_page" :maxPage="response?.data?.meta?.last_page" />
    </footer>
</template>
