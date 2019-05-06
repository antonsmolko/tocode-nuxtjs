<template>
    <section class="new-comment">
        <Message v-if="message" :message="message" />
        <div class="container">
            <form @submit.prevent="onSubmit" class="contact-form">
                <!-- name -->
                <AppInput v-model="comment.name">Name:</AppInput>
                <!-- textarea -->
                <AppTextarea v-model="comment.text">Comment:</AppTextarea>
                <!-- buttons -->
                <div class="controls">
                    <AppButton>Submit!</AppButton>
                </div>
            </form>
        </div>
    </section>
</template>

<script>
export default {
    name: 'new-comment',
    props: {
        postId: {
            type: String,
            required: true
        }
    },
    data () {
        return {
            comment: {
                name: '',
                text: ''
            },
            message: null
        }
    },
    methods: {
        onSubmit () {
            this.$store.dispatch('addComment', {
                postId: this.postId,
                publish: false,
                ...this.comment
            })
            .then(() => {
                this.message = "Submited!";
                this.comment.name = '',
                this.comment.text = ''
            })
            .catch(e => console.log(e));
        }
    }
}
</script>

<style lang="scss">
    .new-comment {
        text-align: center;
        .controls {
            margin: 30px 0;
        }
        .contact-form {
            max-width: 600px;
            margin: 30px auto;
        }
    }
</style>