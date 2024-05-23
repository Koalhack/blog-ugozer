<script setup>
import {ref} from 'vue';
import axios from 'axios';

import Msg from '../Components/Msg.vue';

const getResponse = ref({
    category: null,
    image: null
});

const postResponse = ref();

async function getRequest() {
    try {
        getResponse.value.category = await axios.get('/api/categories');
        getResponse.value.image = await axios.get('/api/images');
    } catch (error) {
        console.error("error: ", error);
    }
}

async function postRequest(e) {
    try {
        let data = new FormData();
        data.append('title', e.target.title.value);
        data.append('category', e.target.category.value);
        data.append('image', e.target.image.value);
        data.append('content', e.target.content.value);
        postResponse.value = await axios.post("/api/post/create", data);
    } catch (error) {
        console.error("error: ", error);
    }
}

getRequest();
</script>

<template>
    <main class="container pt-[150px]">
        <form @submit.prevent="postRequest" class="flex flex-col gap-y-4">
            <input class="input-frame" type="text" name="title" placeholder="title" required/>
            <select class="input-frame" v-if="getResponse.category" name="category">
                <option v-for="item in getResponse.category.data.data" :key="item.id" :value="item.id">{{item?.name}}</option>
            </select>
            <select class="input-frame" v-if="getResponse.image" name="image">
                <option v-for="item in getResponse.image.data.data" :key="item.id" :value="item.id">{{item?.name}}</option>
            </select>
            <textarea class="input-frame" name="content" cols="30" rows="10" placeholder="your text..." required></textarea>
            <input class="button-frame" type="submit" value="Create" />
        </form>
        <section>
            <Msg :response="postResponse" />
        </section>
    </main>
</template>
