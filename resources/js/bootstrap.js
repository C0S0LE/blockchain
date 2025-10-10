import 'bootstrap/dist/css/bootstrap.min.css';
import axios from 'axios';

window.axios = axios;

// Siempre enviar este header
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Enviar cookies de sesión (laravel_session)
axios.defaults.withCredentials = true;

// Adjuntar CSRF Token
const token = document
    .querySelector('meta[name="csrf-token"]')
    ?.getAttribute('content');

if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token;
} else {
    console.error('CSRF token not found in meta tag');
}
