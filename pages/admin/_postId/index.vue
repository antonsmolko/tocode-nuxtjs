<template>
    <div class="wrapper-content wrapper-content--fixed">
        <div class="container">
            <NewPostForm
                :postEdit="post"
                @submit="onSubmit"
            />
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import NewPostForm from '@/components/Admin/NewPostForm.vue'

export default {
    components: {
        NewPostForm
    },
    layout: 'admin',
    asyncData (contex) {
        return axios
                .get(`https://blog-nuxt-df85a.firebaseio.com/posts/${contex.params.postId}.json`)
                .then(res => {
                    return {
                        post: { ...res.data, id: contex.params.postId }
                    }
                })
                .catch(e => contex.error(e));
    },
    methods: {
        onSubmit (post) {
            this.$store.dispatch('editPost', post)
                .then(() => this.$router.push('/admin/'));
        }
    }
}
</script>
