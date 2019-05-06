<template>
    <section v-if="comments" class="comments">
        <div class="cotainer">
            <h2 class="title">Comments:</h2>
            <p v-if="!comments.length">Comments: 0</p>
            <div v-else class="comment" v-for="comment in comments" :key="comment.id">
                <p class="name">{{ comment.name }}</p>
                <p class="text">{{ comment.text }}</p>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'comments',
    props: {
        comments: {
            type: Array,
            default: null
        }
    }
}
</script>

<style lang="scss">
    .comments {
        text-align: center;
        margin: 30px auto;
    }
    .comment {
        width: 600px;
        padding: 20px;
        margin-bottom: 20px;
        background-color: #fff;
        text-align: center;
        .name {
            font-size: 24px;
            color: #4f68f4;
        }
    }
</style>


