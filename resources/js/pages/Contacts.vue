<template>
    <div class="container">
        <h1>Contact Us</h1>

        <form>
            <div class="mb-4">
                <label for="email" class="form-label">Email Address</label>
                <input v-model="email" type="email" class="form-control" id="email">
            </div>

            <div class="mb-4">
                <label for="name" class="form-label">Name</label>
                <input v-model="name" type="text" class="form-control" id="name">
            </div>

            <div class="mb-4">
                <label for="message" class="form-label">Message text</label>
                <textarea v-model="message" id="message" class="form-control" cols="30" rows="10"></textarea>
            </div>

            <button type="submit" @click.prevent="sendMessage()" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
export default {
    name: 'Contacts',
    data: function() {
        return {
            email: '',
            name: '',
            message: ''
        };
    },
    methods: {
        sendMessage: function() {
            axios.post('/api/leads/store', {
                email: this.email,
                name: this.name,
                message: this.message
            })
            .then((response) => {

            })
        }
    }
}
</script>