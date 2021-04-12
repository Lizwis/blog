
require('./bootstrap');

import Vue from 'vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI);

Vue.component('ratepost', require('./components/RatePost.vue').default);
Vue.component('postrating', require('./components/PostRating.vue').default);



const app = new Vue({
    el: '#app',
});
