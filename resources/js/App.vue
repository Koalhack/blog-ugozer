<script setup>
    import Header from './Components/Header.vue';
</script>

<template>
    <Header/>
    <router-view v-slot="{ Component, route }">
        <div :key="route.name">
            <Component :is="Component" />
        </div>
    </router-view>
</template>
