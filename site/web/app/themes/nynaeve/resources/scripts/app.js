import domReady from '@roots/sage/client/dom-ready';
// core version + navigation, pagination, autoplay modules:
import Swiper from 'swiper';
import { Autoplay, Navigation, Pagination } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/autoplay';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

/**
 * Application entrypoint
 */
domReady(async () => {
  // Product gallery
  const gallery = document.querySelector('.product-gallery');
  if (gallery) {
    const mainImage = gallery.querySelector('.main-image');
    const thumbs = gallery.querySelectorAll('.gallery-thumb');
    
    if (mainImage && thumbs.length > 0) {
      // console.log('Gallery initialized with', thumbs.length, 'thumbnails.');
      
      thumbs.forEach(thumb => {
        thumb.addEventListener('click', function() {
          const fullSrc = this.dataset.full;
          const fullSrcset = this.dataset.srcset;
          // console.log('Thumbnail clicked:', fullSrc);
          mainImage.src = fullSrc;
          mainImage.srcset = fullSrcset;
          
          // Update active state
          thumbs.forEach(t => t.classList.remove('active'));
          this.classList.add('active');
        });
      });
    } else {
      // console.error('Main image or thumbnails not found.');
    }
  } else {
    // console.error('Gallery not found.');
  }

  // Portfolio slider
  const portfolioSlider = new Swiper('.portfolio-slider', {
    modules: [Autoplay, Navigation, Pagination],
    autoplay: {
      delay: 5000,
    },
    navigation: {
      nextEl: '.portfolio-slider-next',
      prevEl: '.portfolio-slider-prev',
    },
    pagination: {
      el: '.portfolio-slider-pagination',
      clickable: true,
    },
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
