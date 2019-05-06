<template>
    <section class="post list">
        <div class="container">
            <div class="posts__wrapper">
                <post-preview
                    v-for="post in posts"
                    :key="post.id"
                    :admin="admin"
                    :post="post"
                />
            </div>
        </div>
    </section>
</template>

<script>
import PostPreview from '@/components/Blog/PostPreview.vue'

export default {
    name: 'posts-list',
    components: {
        PostPreview
    },
    props :{
        posts: {
            type: Array,
            required: true
        },
        admin: {
            type: Boolean,
            default: false
        }
    }
}
</script>

<style lang="scss">
    .posts__wrapper {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }
</style>

