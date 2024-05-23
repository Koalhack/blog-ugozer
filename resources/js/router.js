import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: "/",
            component: () => import("./Pages/HomeRoute.vue"),
            meta: {
                title: "Home",
            },
        },
        {
            path: "/post/:slug/:id",
            component: () => import("./Pages/PostRoute.vue"),
            meta: {
                title: "Post",
            },
        },
        {
            path: "/test",
            component: () => import("./Pages/TestRoute.vue"),
        },
    ],
});

router.beforeEach((to, from) => {
    document.title = `${to.meta?.title} - Blog Ugozer` ?? "Blog Ugozer";
});

export default router;
