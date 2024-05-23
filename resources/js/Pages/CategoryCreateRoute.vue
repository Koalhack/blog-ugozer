<script setup>
import {ref} from 'vue';
import axios from 'axios';

import Msg from '../Components/Msg.vue';

const response = ref();

async function postRequest(e) {
    try {
        let data = new FormData();
        data.append('name', e.target.name.value)
        response.value = await axios.post("/api/category/create", data)
    } catch (error) {
        console.error("error: ", error);
    }
}

</script>

<template>
    <main class="container pt-[150px]">
        <form @submit.prevent="postRequest" class="flex flex-col gap-y-4">
            <input class="input-frame" type="text" name="name" placeholder="name" required/>
            <input class="button-frame" type="submit" value="Create" />
        </form>
        <section>
            <Msg :response="response" />
        </section>
    </main>
</template>
