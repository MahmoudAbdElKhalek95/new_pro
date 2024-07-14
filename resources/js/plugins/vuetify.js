import Vue from 'vue'
import Vuetify from 'vuetify/lib'
import '@mdi/font/css/materialdesignicons.css'

Vue.use(Vuetify)

const opts = {
    icons: {
        iconfont: 'mdi',  // 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4'
      },
      theme: {
        dark: false,
      },
    themes: {
        light: {
            // primary: "#4682b4",
            // secondary: "#b0bec5",
            // accent: "#8c9eff",
            error: "#b71c1c",
          primary: '#4CAF50',
          secondary: '#9C27b0',
          accent: '#9C27b0',
          info: '#00CAE3',
        },
    },
}

export default new Vuetify(opts)