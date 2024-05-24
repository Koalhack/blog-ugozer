<script setup>
    //INFO: Dependencies
    import axios from 'axios';
    import {ref, watch, onMounted} from 'vue';
    import {useRoute} from 'vue-router';

    //INFO: Components
    import Pagination from '../Components/Pagination.vue';
    import Msg from '../Components/Msg.vue';

    const route = useRoute();
    const response = ref();
    const activePage = ref(1);

    const deleteResponse = ref();

    let url = {
        get: "",
        delete: ""
    };

    switch(route.meta.type) {
        case "post":
            url.get = "/api/posts";
            url.delete = "/api/post";
        break;
        case "category":
            url.get = "/api/categoriesPag";
            url.delete = "/api/category";
        break;
        case "image":
            url.get = "/api/imagesPag";
            url.delete = "/api/image"
        break;
    }

    async function getRequest(url) {
        try {
            response.value = await axios.get(`${url}?page=${activePage.value}`);
        } catch (error) {
            console.log("error: ", error);
        }
    }

    async function deleteRequest(url) {
        try {
            deleteResponse.value = await axios.delete(url);
        } catch (error) {
            console.log("error: ", error);
        }
    }

    function deleteItem(url, id) {
        deleteResponse.value = deleteRequest(url);
        response.value.data.data = response.value.data.data.filter(item => item.id !== id);
    }

    getRequest(url.get);
    watch(activePage, () => getRequest(url.get));
</script>

<template>
    <main class="container pt-[150px]">
        <section>
            <ul class="flex flex-col gap-2" v-if="response">
                <li
                    v-for="item in response?.data?.data" :key="item.id"
                    class="flex justify-between px-4 py-3 rounded-sm border border-carbon-300 bg-carbon-900"
                >
                    <div v-if="$route.meta.type === 'post'" class="flex gap-x-5">
                        <span>{{item.title}}</span>
                        <span>{{item.category_name}}</span>
                    </div>
                    <div v-if="$route.meta.type !== 'post'" class="flex gap-x-5">
                        <span>{{item.name}}</span>
                    </div>
                    <div class="flex gap-x-3">
                        <router-link v-if="$route.meta.type === 'post'" :to="`/admin/post/edit/${item.id}`" class="button-simple">Edit</router-link>
                        <button @click.prevent="deleteItem(`${url.delete}/${item.id}/delete`, item.id)" class="button-simple">Delete</button>
                    </div>
                </li>
            </ul>
        </section>
        <div class="flex justify-center mt-8">
            <router-link :to="`${$route.fullPath}/create` " class="button-frame">Add new</router-link>
        </div>
        <section >
            <Msg :response="deleteResponse" />
        </section>
    </main>
    <footer>
        <Pagination @page="(page) => activePage = page" :activePage="response?.data?.meta?.current_page" :maxPage="response?.data?.meta?.last_page" />
    </footer>
</template>
