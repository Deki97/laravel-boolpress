<template>
    <div class="container">
        <h1>{{ post.title }}</h1>

        <h5 v-if="post.category">Category: {{ post.category.name }}</h5>

        <div v-if="post.tags.length > 0">
            <router-link v-for="tag in post.tags" :key="tag.id" class="badge bg-info text-dark mx-2" :to="{ name: 'tag-info', params: { slug: tag.slug }}">{{ tag.name }}</router-link>
        </div>

        <img v-if="post.image" :src="post.image" class="card-img-top" :alt="post.title">

        <p>{{ post.content }}</p>
    </div>
</template>

<script>
export default {
    name: 'PostInfo',
    data: function() {
        return {
            post: false
        };
    },
    methods: {
        getPost() {
            axios.get('/api/posts/' + this.$route.params.slug)
            .then((response) => {
                if(response.data.success) {
                    this.post = response.data.results;
                } else {
                    this.$router.push({ name: 'not-found' });
                }   
            });
        }
    },
    created: function() {
        this.getPost();
    }
}
</script>