<template>
    <div class="wrapper-content wrapper-content--fixed">
        <div class="container">
            <CommentTable
                :thead="['Name', 'Text', 'Status', 'Change Status', 'Delete']"
            >
                <tbody slot="tbody">
                    <tr v-for="comment in comments" :key="comment.id"> 
                        <td><span>{{ comment.name}}</span></td>
                        <td><span>{{ comment.text}}</span></td>
                        <td>
                            <span v-if="comment.publish" class="status true">Publish</span>
                            <span v-else class="status false">Hiden</span>
                        </td>
                        <td><span @click="changeComment(comment)" class="link">Change Status</span></td>
                        <td><span @click="deleteComment(comment.id)" class="link">Delete</span></td>
                    </tr>
                </tbody>
            </CommentTable>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import CommentTable from '@/components/Admin/CommentTable.vue'

export default {
    components: {
        CommentTable
    },
    layout: 'admin',
    data () {
        return {
            comments: []
        }
    },
    created() {
        this.loadComments();
    },
    methods: {
        loadComments () {
            this.comments = [];
            axios
                .get(`https://blog-nuxt-df85a.firebaseio.com/comments.json`)
                .then(res => {
                    Object
                        .keys(res.data)
                        .map(id => this.comments.push({id, ...res.data[id]}));
                });
        },
        changeComment (comment) {
            comment.publish = !comment.publish;
            axios
                .put(`https://blog-nuxt-df85a.firebaseio.com/comments/${comment.id}.json`, comment)
                .catch(e => {
                    console.log(e);
                    throw Error;
                })
        },
        deleteComment (id) {
            axios
                .delete(`https://blog-nuxt-df85a.firebaseio.com/comments/${id}.json`)
                .then(() => this.loadComments())
                .catch(e => {
                    console.log(e);
                    throw Error;
                })
        }
    }
}
</script>
