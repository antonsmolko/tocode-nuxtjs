<template>
    <div class="wrapper-content wrapper-content--fixed">
        <div class="container">
            <NewPostForm @submit="onSubmit" />
        </div>
    </div>
</template>

<script>
import NewPostForm from '@/components/Admin/NewPostForm.vue'

export default {
    components: {
        NewPostForm
    },
    layout: 'admin',
    methods: {
        onSubmit (post) {
            this.$store.dispatch('addPost', post)
                .then(() => this.$router.push('/admin'));
        }
    }
}
</script>
