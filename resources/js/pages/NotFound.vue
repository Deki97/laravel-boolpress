<template>
    <div class="container">
        <img class="mt-5" height="150px" width="150px" src="https://cdn-icons-png.flaticon.com/512/1548/1548682.png" alt="Not found icon">
        <h2>Ops..la ricerca non ha prodotto nessun risultato</h2>

        <router-link class="nav-link" :to="{ name: 'blog' }">Ritorna alla sezione dei blog</router-link>
    </div>
</template>

<script>
export default {
    name: 'NotFound'
}
</script>