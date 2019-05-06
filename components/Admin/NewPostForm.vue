<template>
    <section class="new-post">
        <form @submit.prevent="onSubmit">
            <AppInput v-model="post.title">Title:</AppInput>
            <AppInput v-model="post.descr">Descr:</AppInput>
            <AppInput v-model="post.img">Img Link:</AppInput>
            <MdEditor v-model="post.content">Content:</MdEditor>
            <!-- button -->
            <div class="controls">
                <div class="btn btnDanger" @click="cancel">Cancel</div>
                <AppButton type="submit">Save</AppButton>
            </div>
        </form>
    </section>
</template>

<script>
import "highlight.js/styles/github.css"
import hljs from 'highlight.js'

import TurndownService from 'turndown';

const turndownService = new TurndownService({
    headingStyle: 'atx'
});

export default {
    props: {
        postEdit: {
            type: Object
        }
    },
    data () {
        return {
            post: this.postEdit ? { ...this.postEdit } : {
                title: '',
                descr: '',
                img: '',
                content: ''
            }
        }
    },
    methods: {
        onSubmit () {
            this.$emit('submit', this.post);
        },
        cancel () {
            this.$router.push('/admin/');
        },
    }
}
</script>

<style lang="scss">
.controls {
    text-align: center;
    margin: 20px 0;
}
</style>

