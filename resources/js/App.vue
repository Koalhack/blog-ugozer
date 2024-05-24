<script setup>
    //INFO: Components
    import Header from './Components/Header.vue';
    import Copyright from './Components/Copyright.vue';
</script>

<template>
    <Header/>
    <router-view v-slot="{ Component, route }">
        <div :key="route.name">
            <Component :is="Component" />
        </div>
    </router-view>
    <footer>
        <Copyright link="https://portfolio.koalhack.duckdns.org" name="Alexandre Saner" />
    </footer>
</template>
