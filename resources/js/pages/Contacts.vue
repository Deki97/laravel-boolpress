<template>
    <div class="container">
        <h1>Contact Us</h1>

        <form>
            <div class="mb-4">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email">
            </div>

            <div class="mb-4">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name">
            </div>

            <div class="mb-4">
                <label for="message" class="form-label">Message text</label>
                <textarea id="message" class="form-control" cols="30" rows="10"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
export default {
    name: 'Contacts'
}
</script>