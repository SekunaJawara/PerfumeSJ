<template>
    <swiper
      :slidesPerView="1"
      :spaceBetween="10"
      :breakpoints="{
        '640': { slidesPerView: 2, spaceBetween: 20 },
        '768': { slidesPerView: 4, spaceBetween: 40 },
        '1024': { slidesPerView: 5, spaceBetween: 25 }
      }"
      :loop="true" 
      :modules="modules"
      class="mySwiper"
    >
      <swiper-slide v-for="(img, i) in imagenes" :key="i">
        <a :href="`/?nota=${encodeURIComponent(img.nombre)}`" class="slide-link">
          <img :src="img.url" :alt="'Imagen ' + (i + 1)" />
        </a>
        <span class="nombre-img">{{ img.nombre }}</span>
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
  background: transparent; /* Quita fondo blanco del slide completo */
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 8px;
}

.swiper-slide span {
  margin-top: 8px;
  font-weight: 500;
  color: #333;
  text-transform: capitalize;
}

  .swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  .slide-link {
  display: block;
  width: 100%;
  background: #fff; /* Fondo blanco solo para la imagen */
  border: 1px solid #ccc;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.slide-link img {
  width: 100%;
  height: auto;
  object-fit: cover;
  display: block;
}

  .slide-link img:hover {
    transform: scale(1.05);
  }

  .nombre-img {
  margin-top: 4px;
  font-weight: 500;
  color: #333;
  text-transform: capitalize;
}
  </style>
  