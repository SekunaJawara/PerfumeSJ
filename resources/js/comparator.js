import { createApp } from 'vue';
import Comparator from './components/Comparator.vue';

const el = document.getElementById('comparator');

if (el) {
    const perfumes = JSON.parse(el.dataset.perfumes);
    createApp(Comparator, { perfumes }).mount('#comparator');
} else {
    console.error('Element with id "comparator" not found.');
}
