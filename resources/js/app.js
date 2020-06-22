/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import {componentList} from "./components/index";
import VModal from 'vue-js-modal'

require('./bootstrap');

window.Vue = require('vue');
window.Vue.use(VModal, {componentName: 'v-modal'})

componentList.forEach(route => {
    Vue.component(route.name, require(`./components/${route.component}`).default);
})




Vue.prototype.$bus = new Vue({})

const app = new Vue({
    el: '#app',
});
