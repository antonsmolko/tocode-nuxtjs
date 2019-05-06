<template>
  <div class="wrapper-content wrapper-content--fixed">
    <intro title="My blog: " />
    <posts-list :posts="postsLoaded" />
  </div>
</template>

<script>
import Intro from '@/components/UI/Intro.vue'
import PostsList from '@/components/Blog/PostsList.vue'
export default {
  components: {
    Intro,
    PostsList
  },
  head () {
    let title = 'My Blog Page!',
        descr = 'My SSR Blog! Width Nuxt.js!',
        type = 'site'

    return {
      title,
      meta: [
        { hid: 'og:title', name: 'og:title', content: title },
        { hid: 'og:description', name: 'og:description', content: descr },
        { hid: 'description', name: 'description', content: descr },
        { hid: 'og:type', name: 'og:type', content: type },
        ]
    }
  },
  computed: {
    postsLoaded () {
      return this.$store.getters.getPostsLoaded
    }
  }
}
</script>
