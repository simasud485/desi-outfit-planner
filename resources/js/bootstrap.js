import axios from 'axios';
window.axios = axios;

//set the base URL to my Laravel API version
window.axios.defaults.baseURL = 'http://127.0.0.1:8000/api/v1';
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
