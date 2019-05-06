import pkg from './package'
import axios from 'axios'

export default {
  mode: 'universal',

  /*
  ** Headers of the page
  */
  head: {
    title: pkg.name,
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { name: 'yandex-verification', content: 'KEY' },
      { name: 'google-site-verification', content: 'KEY' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css?family=Montserrat' }
    ]
  },

  // Animation
  transition: {
    name: 'fade',
    mode: 'out-in'
  },

  /*
  ** Customize the progress-bar color
  */
  loading: { color: '#fff' },

  /*
  ** Global CSS
  */
  css: [
    { src: '~/assets/scss/main.scss', lang: 'scss' },
    // lib css
    'codemirror/lib/codemirror.css',
    // merge css
    'codemirror/addon/merge/merge.css',
    // theme css
    'codemirror/theme/idea.css'
  ],

  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    { src: '~plugins/app-components' },
    { src: '~plugins/nuxt-codemirror-plugin.js', ssr: false }
  ],
  /*
  ** Nuxt.js modules
  */
  modules: [
    ['@nuxtjs/google-analytics', {
      id: 'UA-KEY'
    }],
    ['@nuxtjs/yandex-metrika', {
      id: 'KEY',
      webvisor: false,
      clickmap: true,
      trackLinks: true,
    }],
    '@nuxtjs/markdownit'
  ],

  markdownit: {
    injected: true,
    preset: 'default',
    linkify: true,
    breaks: true,
    html: true,
    use: [
      ['markdown-it-container'],
      'markdown-it-attrs'
    ]
  },

  /*
  ** Build configuration
  */
  build: {
    vendor: [
      'vue',
      'axios'
    ],
    /*
    ** You can extend webpack config here
    */
    extend(config, ctx) {
    }
  },
  generate: {
    routes: function () {
      return axios.get('https://blog-nuxt-df85a.firebaseio.com/posts.json')
      .then((res) => {

        return Object.keys(res.data).map(key => {
          return '/blog/' + key
        })
      })
    }
  }
}