<script setup>
import {ref} from 'vue';
import {useRoute} from 'vue-router';
import axios from 'axios';

import Msg from '../Components/Msg.vue';

const route = useRoute();
const postId = route.params.id;

const getResponse = ref({
    post: null,
    category: null,
    image: null
});

const putResponse = ref();

async function getRequest() {
    try {
        getResponse.value.post = await axios.get(`/api/post/${postId}`);
        getResponse.value.category = await axios.get('/api/categories');
        getResponse.value.image = await axios.get('/api/images');
    } catch (error) {
        console.error("error: ", error);
    }
}

async function putRequest(e) {
    try {
        let data = new FormData();
        data.append('_method', 'put');
        data.append('title', e.target.title.value);
        data.append('category', e.target.category.value);
        data.append('image', e.target.image.value);
        data.append('content', e.target.content.value);
        putResponse.value = await axios.post(`/api/post/${postId}/update`, data);
        console.log(e.target.title.value, e.target.category.value, e.target.image.value, e.target.content.value);
    } catch (error) {
        console.error("error: ", error);
    }
}

getRequest();
</script>

<template>
    <main class="container pt-[150px]">
        <form v-if="getResponse.post" @submit.prevent="putRequest" class="flex flex-col gap-y-4">
            <input
                class="input-frame"
                type="text"
                name="title"
                placeholder="title"
                :value="getResponse.post.data.data.title"
                required
            />
            <select class="input-frame" v-if="getResponse.category" name="category">
                <option
                    v-for="item in getResponse.category.data.data"
                    :key="item.id"
                    :value="item.id"
                    :selected="getResponse.post.data.data.category_id === item.id"
                >
                    {{item?.name}}
                </option>
            </select>
            <select class="input-frame" v-if="getResponse.image" name="image">
                <option
                    v-for="item in getResponse.image.data.data"
                    :key="item.id"
                    :value="item.id"
                    :selected="getResponse.post.data.data.image_id === item.id"
                >
                    {{item?.name}}
                </option>
            </select>
            <textarea
                class="input-frame"
                name="content" cols="30"
                rows="10" placeholder="your text..."
                required
            >{{getResponse.post.data.data.content}}</textarea>
            <input class="button-frame" type="submit" value="Update" />
        </form>
        <section>
            <Msg :response="putResponse" />
        </section>
    </main>
</template>
