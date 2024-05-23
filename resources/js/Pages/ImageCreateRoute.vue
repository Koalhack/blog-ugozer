<script setup>
import {ref} from 'vue';
import axios from 'axios';

import Msg from '../Components/Msg.vue';

const response = ref();

async function postRequest(e) {
    try {
        const config = {
            headers: {
                'content-type': 'multipart/form-data'
            }
        }
        let data = new FormData();
        data.append('image', e.target.image.files[0])
        response.value = await axios.post("/api/image/add", data, config)
    } catch (error) {
        console.error("error: ", error);
    }
}
</script>

<template>
    <main class="container pt-[150px]">
        <form @submit.prevent="postRequest" enctype="multipart/form-data" class="flex flex-col gap-y-4">
            <input class="input-frame" type="file" name="image" required/>
            <input class="button-frame" type="submit" value="Upload" />
        </form>
        <section>
            <Msg :response="response" />
        </section>
    </main>
</template>
