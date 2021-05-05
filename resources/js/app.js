import 'babel-polyfill'
// import Vue from 'https://cdn.jsdelivr.net/npm/vue@2.6.11/dist/vue.esm.browser.js'
import VModal from 'vue-js-modal'
import YandexMap from './yandex-map'
import Filters from './filters-vue'
Vue.config.devtools = true

Vue.use(VModal)
Vue.use(YandexMap)
Vue.use(Filters)

window.events = new Vue()

new Vue({
    el: '#newflat-app'
})