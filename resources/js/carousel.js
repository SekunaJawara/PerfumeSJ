// resources/js/app.js
import './bootstrap';
import { createApp } from 'vue';
import Carousel from './components/Carousel.vue';

const el = document.getElementById('carousel');
const storageUrl = el ? (el.dataset.storageUrl || '/storage/') : '/storage/';

createApp(Carousel, { storageUrl }).mount('#carousel');
