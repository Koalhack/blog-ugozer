import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        /*********************************************************************
         ******************              Client              ******************
         **********************************************************************/

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

        /*********************************************************************
         ******************              Admin               ******************
         **********************************************************************/

        /******************           List+Delete Post        ******************/
        {
            path: "/admin/post",
            component: () => import("./Pages/ListRoute.vue"),
            meta: {
                type: "post",
                title: "Admin Post",
            },
        },

        /******************           Create Post            ******************/
        {
            path: "/admin/post/create",
            component: () => import("./Pages/PostCreateRoute.vue"),
            meta: {
                title: "Admin Post",
            },
        },

        /******************           Edit Post            ******************/
        {
            path: "/admin/post/edit/:id",
            component: () => import("./Pages/PostEditRoute.vue"),
            meta: {
                title: "Admin Post",
            },
        },

        /******************           List+Delete Category            ******************/
        {
            path: "/admin/category",
            component: () => import("./Pages/ListRoute.vue"),
            meta: {
                type: "category",
                title: "Admin Category",
            },
        },

        /******************           Create Category            ******************/
        {
            path: "/admin/category/create",
            component: () => import("./Pages/CategoryCreateRoute.vue"),
            meta: {
                title: "Admin Category",
            },
        },
        /******************           List+Delete Image            ******************/
        {
            path: "/admin/image",
            component: () => import("./Pages/ListRoute.vue"),
            meta: {
                type: "image",
                title: "Admin Image",
            },
        },

        /******************           Create Image            ******************/
        {
            path: "/admin/image/create",
            component: () => import("./Pages/ImageCreateRoute.vue"),
            meta: {
                title: "Admin Image",
            },
        },
    ],
});

router.beforeEach((to, from) => {
    document.title = `${to.meta?.title} - Blog Ugozer` ?? "Blog Ugozer";
});

export default router;
