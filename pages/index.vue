<template>
  <div class="wrapper-content wrapper-content--fixed">
    <promo />
    <Intro title="My lasts posts: " />
    <posts-list :posts="postsLoaded" />
    <contacts />
  </div>
</template>

<script>
import Promo from '@/components/Promo.vue'
import Contacts from '@/components/Contacts.vue'
import PostsList from '@/components/Blog/PostsList.vue'
export default {
  components: {
    Promo,
    Contacts,
    PostsList
  },
  head () {
    let title = 'My SSR Blog!',
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
      return this.$store.getters.getPostsLoaded;
    }
  }
}
</script>
