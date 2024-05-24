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
            path: "/admin/post",
            component: () => import("./Pages/ListRoute.vue"),
            meta: {
                type: "post",
                title: "Admin Post",
            },
        },
        {
            path: "/admin/category",
            component: () => import("./Pages/ListRoute.vue"),
            meta: {
                type: "category",
                title: "Admin Category",
            },
        },
        {
            path: "/admin/image",
            component: () => import("./Pages/ListRoute.vue"),
            meta: {
                type: "image",
                title: "Admin Image",
            },
        },
        {
            path: "/admin/category/create",
            component: () => import("./Pages/CategoryCreateRoute.vue"),
            meta: {
                title: "Admin Category",
            },
        },
        {
            path: "/admin/image/create",
            component: () => import("./Pages/ImageCreateRoute.vue"),
            meta: {
                title: "Admin Image",
            },
        },
        {
            path: "/admin/post/create",
            component: () => import("./Pages/PostCreateRoute.vue"),
            meta: {
                title: "Admin Post",
            },
        },
        {
            path: "/admin/post/edit/:id",
            component: () => import("./Pages/PostEditRoute.vue"),
            meta: {
                title: "Admin Post",
            },
        },
    ],
});

router.beforeEach((to, from) => {
    document.title = `${to.meta?.title} - Blog Ugozer` ?? "Blog Ugozer";
});

export default router;
