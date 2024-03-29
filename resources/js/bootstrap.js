import Vue from 'vue';
import Buefy from 'buefy';
import Toaster from "./modules/Toaster";
import 'buefy/dist/buefy.css';

Vue.use(Buefy);

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

//register components
Vue.component('AdminPage', require('./components/Views/AdminPage').default);
Vue.component('HomePage', require('./components/views/HomePage').default);

Vue.prototype.$toast = Toaster;
