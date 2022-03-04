<template>
    <div class="container">
        <h1>{{ tag.name }}</h1>

        <h3>Posts</h3>
        <div class="list-group">
            <router-link v-for="post in tag.posts" :key="post.id" class="list-group-item list-group-item-action" :to="{ name: 'post-info', params: { slug: post.slug }}">{{ post.title }}</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: 'TagInfo',
    data: function() {
        return {
            tag: false
        };
    },
    methods: {
        getTag() {
            axios.get('/api/tags/' + this.$route.params.slug)
            .then((response) => {
                this.tag = response.data.results;
            });
        }
    },
    created: function() {
        this.getTag();
    }
}
</script>