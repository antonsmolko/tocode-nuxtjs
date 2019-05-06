<template>
    <p class="message">{{ message }}</p>
</template>

<script>
export default {
    props: {
        message: {
            type: String,
            required: true
        }
    }
}
</script>

<style lang="scss" scope>
.message {
    display: block;
    width: 100%;
    color: rgb(0, 236, 32);
    font-size: 1.2em;
    text-align: center;
}
</style>
