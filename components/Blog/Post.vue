<template>
    <section class="post">
        <div class="container">
            <!-- header -->
            <div class="post-header">
                <img :src="post.img" :alt="post.title">
                <h1 class="title">{{ post.title }}</h1>
                <p>{{ post.descr }}</p>
            </div>

            <!-- body -->
            <div class="post-body" v-html="post.content"></div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'post',
    props: {
        post: {
            type: Object,
            required: true
        }
    },
    // created () {
    //     let postBody = this.querySelector('.post-body');
    //     postBody.innerHTML = this.post.content;
    // }
}
</script>


