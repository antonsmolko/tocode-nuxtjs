<template>
    <posts-list :admin="true" :posts="postsLoaded" />
</template>

<script>
import PostsList from '@/components/Blog/PostsList.vue'

export default {
    components: {
        PostsList
    },
    layout: 'admin',
    computed: {
        postsLoaded () {
            return this.$store.getters.getPostsLoaded
        }
    }
}
</script>

