export default {
  // Disable server-side rendering: https://go.nuxtjs.dev/ssr-mode
  ssr: false,

  // Target: https://go.nuxtjs.dev/config-target
  target: 'static',

  router: {
    middleware: ['auth']
  },

  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'moxybase-fe',
    htmlAttrs: {
      lang: 'en'
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' }
    ],
    script: [
      {
        src: 'https://unpkg.com/@tabler/core@latest/dist/js/tabler.min.js'
      }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
    ]
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
    '~/assets/css/main', '~/assets/css/tabler.min',
    '@/assets/css/ckeditor.css',
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    { src: '~plugins/v-calendar.js', ssr: false },
    { src: '~/plugins/mixinCommonMethods' , ssr: false },
    { src: '~/plugins/axios', ssr: false  },
    { src: '~/plugins/repositories.js' , ssr: false },
    { src: '~/plugins/helpers/g-organization.js', ssr: false  },
    { src: '~/plugins/echo', ssr: false  },
    { src: '~/plugins/multiselect', ssr: false  },
    { src: '~/plugins/vuedraggable.js', ssr: false  },
    { src: '~/plugins/vapor-file-upload.js', ssr: false  },
    { src: '~/plugins/toast.js', mode: 'client' },
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    '@nuxtjs/auth-next'
  ],

  auth: {
    strategies: {
      cookie: {
        cookie: {
          // (optional) If set, we check this cookie existence for loggedIn check
          name: 'XSRF-TOKEN',
        },
        user: {
          property: 'data',
          // autoFetch: true
        },
        endpoints: {
          // (optional) If set, we send a get request to this endpoint before login
          csrf: {
            url: process.env.API_URL + '/sanctum/csrf-cookie'
          },
          login: {url: process.env.API_URL + '/login?portal=student', method: 'post'},
          logout: {url: process.env.API_URL + '/logout?portal=student', method: 'post'},
          user: {url: process.env.API_URL + '/api/student/profile?portal=student', method: 'get'}
        },
      }
    },
    redirect: {
      login: '/user/auth/login',
      logout: '/user/auth/login',
      callback: '/user/auth/login',
      // home: '/'
    }
  },

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    // Workaround to avoid enforcing hard-coded localhost:3000: https://github.com/nuxt-community/axios-module/issues/308
    baseURL: process.env.API_URL,
    credentials: true
  },

  // Build Configuration: https://go.nuxtjs.dev/config-buildR
  build: {
  },

  server: {
    port: 3000 // default: 3000
  }
}
