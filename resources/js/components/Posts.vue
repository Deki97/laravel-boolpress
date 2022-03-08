<template>
    <div class="container">
        <h1>Tutti i post</h1>

        <div class="row row-cols-4">

            <!-- Single Post -->
            <div v-for="post in posts" :key="post.id" class="col">
                <div class="card mb-2">
                    <img v-if="post.image" :src="post.image" class="card-img-top" :alt="post.title">
                    <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p class="card-text"> {{ truncateText(post.content, 80) }}</p>
                    </div>

                    <div class="card-body">
                        <router-link :to="{ name: 'post-info', params: { slug: post.slug } }">Vai all'articolo</router-link>
                    </div>
                </div>
            </div>
            <!-- End Single Post -->

        </div>

        <!-- Pagination -->
        <nav>
            <ul class="pagination">
                <!-- Prev link -->
                <li class="page-item" :class="{ 'disabled' : currentPage == 1 }">
                    <a @click="getAllPosts(currentPage - 1)" class="page-link" href="#">Previous</a>
                </li>

                <!-- Page number link -->
                <li v-for="page in lastPage" :key="page" class="page-item" :class="{ 'active' : currentPage == page}">
                    <a @click="getAllPosts(page)" class="page-link" href="#">{{ page }}</a>
                </li>

                <!-- Next link -->
                <li class="page-item" :class="{ 'disabled' : currentPage == lastPage}">
                    <a @click="getAllPosts(currentPage + 1)" class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'Posts',
    data: function() {
        return {
            posts: [],
            // Al caricamento della pagina verrà visualizzata di default la prima pagina (1)
            currentPage: 1,
            lastPage: false
        };
    },
    methods: {
        getAllPosts: function(numberPage) {
            axios.get('/api/posts', {
                params: {
                    page: numberPage
                }
            }).then((response) => {
                this.posts = response.data.results.data;
                this.currentPage = response.data.results.current_page;
                this.lastPage = response.data.results.last_page;
            })
        },
        // Funzione che creo per tagliare automaticamente testi più lunghi di tot caratteri
        // In modo da non mostrare all'utente tutto il contenuto, dato che poi nella show avrà il dettaglio completo
        truncateText: function(text, maxNumberOfChars) {
            if(text.length > maxNumberOfChars) {
                // Se il testo è più lungo di tot caratteri, lo taglio e aggiungo 3 puntini alla fine
                // In questo modo l'utente capisce che trova il contenuto completo nella show relativa
                return text.substr(0, maxNumberOfChars) + '...';
            }

            return text;
        }
    },
    created: function() {
        // Al created, ossia al caricamento della pagina verrà visualizzata la prima pagina (1)
        this.getAllPosts(1);
    }
}
</script>