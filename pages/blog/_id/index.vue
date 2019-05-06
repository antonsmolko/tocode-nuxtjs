<template>
    <div class="wrapper-content wrapper-content--fixed">
        <post :post="post"/>
        <no-ssr>
            <comments :comments="comments" />
            <new-comment :postId="id"/>
        </no-ssr>
    </div>
</template>

<script>
import axios from 'axios'

import Post from '@/components/Blog/Post.vue'
import NewComment from '@/components/Comments/NewComment.vue'
import Comments from '@/components/Comments/Comments.vue'

export default {
    components: {
        Post,
        Comments,
        NewComment
    },
    head () {
        let title = this.post.title,
            descr = this.post.descr,
            img = this.post.img,
            type = 'article'
        return {
            title,
            meta: [
                { hid: 'og:title', name: 'og:title', content: title },
                { hid: 'og:description', name: 'og:description', content: descr },
                { hid: 'description', name: 'description', content: descr },
                { hid: 'og:type', name: 'og:type', content: type },
                { hid: 'og:image', name: 'og:image', content: img },
            ]
        }
    },
    async asyncData (contex) {
        let [post, comments] = await Promise.all([
            axios
                .get(`https://blog-nuxt-df85a.firebaseio.com/posts/${contex.params.id}.json`),
            axios
                .get(`https://blog-nuxt-df85a.firebaseio.com/comments.json`)
        ]);

        // Comments
        let postComments = Object
                            .values(comments.data)
                            .filter(comment => (comment.postId === contex.params.id) && comment.publish);

        return {
            id: contex.params.id,
            post: post.data,
            comments: postComments
        }
    }
}
</script>

<style lang="scss">
    .post {
        max-width: 900px;
        margin: 0 auto;
    }
    .post-header {
        text-align: center;
        margin-bottom: 30px;
        img {
            max-width: 400px;
            margin-bottom: 16px;
        }
        p {
            color: #999;
        }
    }
    .post-body {
        text-align: left;
    }
</style>

