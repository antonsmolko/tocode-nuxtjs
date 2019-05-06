<template>
  <div class="wrapper-content wrapper-content--fixed">
    <section>
        <div class="container">
            <h1 class="title">About my blog: </h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet nobis eos delectus placeat culpa distinctio suscipit labore. Assumenda sapiente atque sint accusamus ea nesciunt, fuga, eius modi ad quisquam eaque.</p>
            <no-ssr>
              <intro title="Lorem ipsum dolor sit amet consectetur adipisicing elit." />
            </no-ssr>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet nobis eos delectus placeat culpa distinctio suscipit labore. Assumenda sapiente atque sint accusamus ea nesciunt, fuga, eius modi ad quisquam eaque.</p>
            <img src="@/assets/img/arbuz.jpg" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet nobis eos delectus placeat culpa distinctio suscipit labore. Assumenda sapiente atque sint accusamus ea nesciunt, fuga, eius modi ad quisquam eaque.</p>
        </div>
    </section>
  </div>
</template>

<script>
import Intro  from '@/components/UI/Intro.vue'

export default {
  components: {
    Intro
  },
  head () {
    let title = 'About My SSR Blog Page!',
        descr = 'About My SSR Blog! Width Nuxt.js!',
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
}
</script>


<style lang="scss">
  .about {
    text-align: center;
    p {
      margin-bottom: 10px;
    }
  }
</style>

