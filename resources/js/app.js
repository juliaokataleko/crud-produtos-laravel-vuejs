require('./bootstrap');

import Vue from 'vue';

import App from './vue/app';

import { library } from '@fortawesome/fontawesome-svg-core'

import { faPlusSquare, faTrash, faUser, faEdit } from '@fortawesome/free-solid-svg-icons'
import { faUserCircle } from '@fortawesome/free-solid-svg-icons'
import { faBars } from '@fortawesome/free-solid-svg-icons'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faUser, faEdit, faTrash, faPlusSquare, faUserCircle, faBars)

Vue.component('font-awesome-icon', FontAwesomeIcon)

const app = new Vue({
    el: "#app",
    components: { App }
})
