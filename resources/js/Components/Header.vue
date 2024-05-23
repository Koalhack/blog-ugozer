<script setup>
import axios from 'axios';
import {ref, onMounted, onUnmounted} from 'vue';
import {capitalizeFirstLetter} from '../Utils/function.js';

let id = 0;
const items = ref([
    {id: id++, text: 'tech', active: true},
    {id: id++, text: 'dev', active: false},
    {id: id++, text: 'web', active: false},
    {id: id++, text: 'design', active: false},
    {id: id++, text: 'Homelab', active: false},
]);

//INFO: StickyState
const navbar = ref(null);
const isSticky = ref(false);
const scrollCallback = ref(null);

//INFO: API GET
const response = ref();

const getCategories = async () => {
    try {
        response.value = await axios.get("/api/categories");
    } catch (error) {
        console.error("error during data fetching: ", error);
    }
}

onMounted(() => {
    //INFO: StickyState
    scrollCallback.value = window.addEventListener('scroll', () => {
        let stickyOffset = navbar.value?.offsetTop;
        isSticky.value = window.pageYOffset > stickyOffset ? true : false;
    })

    getCategories();
});

onUnmounted(() => {
    window.removeEventListener('scroll', scrollCallback.value);
})
</script>

<template>
    <header
        ref="navbar"
        class="header z-10 text-lg transition-all w-full ease-linear duration-200 border-b "
        :class="isSticky ? 'fixed backdrop-blur-lg bg-carbon-950/85 border-b-carbon-50/10' : 'absolute top-0 left-0 border-b-transparent'">
        <div class="flex flex-col mx-6 mt-4 mb-3">
            <div>
                <router-link to="/" class="block text-carbon-50 py-2 px-3">Ugozer Blog</router-link>
            </div>
            <div  class="overflow-x-auto">
                <ul v-if="response" class="flex">
                    <li>
                        <router-link
                            to="/"
                            class="block py-2 px-3 hover:text-carbon-50 duration-100 ease-linear"
                            :class="$route.query.category === undefined ? 'text-carbon-50' : 'text-carbon-200'"
                        >
                            All
                        </router-link>
                    </li>
                    <li v-for="item in response.data.data" :key="item.id">
                        <router-link
                            :to="'/?category=' + item.id"
                            class="block py-2 px-3 hover:text-carbon-50 duration-100 ease-linear"
                            :class="parseInt($route.query.category) === item.id ? 'text-carbon-50' : 'text-carbon-200'"
                        >
                            {{capitalizeFirstLetter(item?.name)}}
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </header>
</template>
