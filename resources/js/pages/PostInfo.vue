<template>
    <div class="container">
        <h1>{{ post.title }}</h1>

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