import axios from 'axios'
import Cookie from 'js-cookie'

export const state = () => ({
    postsLoaded: [],
    commentsLoaded: [],
    token: null
})

export const mutations = {
    ADD_POST (state, post) {
        state.postsLoaded.push(post);
    },
    SET_POSTS (state, posts) {
        for (let key in posts) {
            state.postsLoaded.push({ ...posts[key], id: key })
        }
    },
    EDIT_POST (state, postEdit) {
        state.postsLoaded = state.postsLoaded.map(post => post.id === postEdit.id ? postEdit : post);
    },
    SET_TOKEN (state, token) {
        state.token = token;
    },
    DESTROY_TOKEN (state) {
        state.token = null;
    }
}

export const actions = {
    nuxtServerInit ({commit}, contex) {
        return axios
                .get('https://blog-nuxt-df85a.firebaseio.com/posts.json')
                .then(res => commit('SET_POSTS', res.data))
                .catch(e => {
                    console.log(e);
                    throw Error;
                })
    },
    authUser ({commit}, authData) {
        const key = 'AIzaSyAl2E8UowXj-2QfObM6D9sqKaPo1j06EHA';
        return axios
                .post(`https://www.googleapis.com/identitytoolkit/v3/relyingparty/verifyPassword?key=${key}`, {
                    email: authData.email,
                    password: authData.password,
                    returnSecureToken: true
                })
                .then(res => {
                    let token = res.data.idToken;
                    commit('SET_TOKEN', token);
                    // to local storage
                    localStorage.setItem('token', token)
                    // to cookie
                    Cookie.set('jwt', token);
                })
                .catch(e => console.log(e));
    },
    initAuth ({commit}, req) {
        let token;
        if (req) {
            if (!req.headers.cookie) return false;
            const jwtCookie = req.headers.cookie
                    .split(';')
                    .find(t => t.trim().startsWith('jwt='));
            if (!jwtCookie) return false;
            token = jwtCookie.split('=')[1];
        } else {
            if (!token) return false;
            token = localStorage.getItem('token');
        }
        commit('SET_TOKEN', token);
    },
    logoutUser ({commit}) {
        commit('DESTROY_TOKEN');
        localStorage.removeItem('token');
        Cookie.remove('jwt');
    },
    addPost ({commit}, post) {
        return axios
                .post('https://blog-nuxt-df85a.firebaseio.com/posts.json', post)
                .then(res => commit('ADD_POST', {...post, id: res.data.name }))
                .catch(e => {
                    console.log(e);
                    throw Error;
                })
    },
    editPost ({commit, state}, post) {
        return axios
                .put(`https://blog-nuxt-df85a.firebaseio.com/posts/${post.id}.json?auth=${state.token}`, post)
                .then(res => commit('EDIT_POST', res.data))
                .catch(e => {
                    console.log(e);
                    throw Error;
                })
    },
    addComment ({commit}, comment) {
        return axios
                .post('https://blog-nuxt-df85a.firebaseio.com/comments.json', comment)
                .then(res => commit('ADD_COMMENT', {...comment, id: res.data.name }))
                .catch(e => {
                    console.log(e);
                    throw Error;
                })
    }
}

export const getters = {
    getPostsLoaded: state => state.postsLoaded,
    checkAuthUser: state => state.token != null
}