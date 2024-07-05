import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
// Import Bootstrap and jQuery
import 'bootstrap';
import $ from 'jquery';
window.$ = window.jQuery = $;
