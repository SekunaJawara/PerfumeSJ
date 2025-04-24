<template>
    <swiper
      :slidesPerView="1"
      :spaceBetween="10"
      :pagination="{ clickable: true }"
      :breakpoints="{
        '640': { slidesPerView: 2, spaceBetween: 20 },
        '768': { slidesPerView: 4, spaceBetween: 40 },
        '1024': { slidesPerView: 5, spaceBetween: 25 }
      }"
      :modules="modules"
      class="mySwiper"
    >
      <swiper-slide v-for="(img, i) in imagenes" :key="i">
        <a :href="`/?nota=${encodeURIComponent(img.nombre)}`" class="slide-link">
          <img :src="img.url" :alt="'Imagen ' + (i + 1)" />
        </a>
      </swiper-slide>
    </swiper>
  </template>
  
  <script>
  import { Swiper, SwiperSlide } from 'swiper/vue';
  import 'swiper/css';
  import 'swiper/css/pagination';
  import { Pagination } from 'swiper/modules';
  
  export default {
    components: {
      Swiper,
      SwiperSlide,
    },
    setup() {
      const imagenes = [
        { nombre: 'bergamota', url: '/storage/notas/bergamota.jpg' },
        { nombre: 'especias', url: '/storage/notas/especias.jpg' },
        { nombre: 'jengibre', url: '/storage/notas/jengibre.jpg' },
        { nombre: 'lavanda', url: '/storage/notas/lavanda.jpg' },
        { nombre: 'manzana', url: '/storage/notas/manzana.jpg' },
        { nombre: 'menta', url: '/storage/notas/menta.jpg' },
        { nombre: 'oud', url: '/storage/notas/oud.jpg' },
        { nombre: 'vainilla', url: '/storage/notas/vainilla.jpg' },
      ];
  
      return {
        modules: [Pagination],
        imagenes,
      };
    },
  };
  </script>
  
  <style scoped>
  .mySwiper {
    width: 100%;
    height: 278px;
  }
  
  .swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  .slide-link {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    text-decoration: none;
  }
  
  .slide-link img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border: 2px solid #ccc;
    border-radius: 10px;
    transition: transform 0.3s ease;
  }
  
  .slide-link img:hover {
    transform: scale(1.05);
  }
  </style>
  