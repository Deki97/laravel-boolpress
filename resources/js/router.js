import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Blog from './pages/Blog.vue';
import PostInfo from './pages/PostInfo.vue';
import TagInfo from './pages/TagInfo.vue';
import NotFound from './pages/NotFound.vue';

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/about",
            name: "about",
            component: About
        },
        {
            path: "/blog",
            name: "blog",
            component: Blog
        },
        {
            path: "/blog/:slug",
            name: "post-info",
            component: PostInfo
        },
        {
            path: "/tags/:slug",
            name: "tag-info",
            component: TagInfo
        },
        {
            path: "/*",
            name: "not-found",
            component: NotFound
        }
    ]
});

export default router;