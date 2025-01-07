import domReady from '@roots/sage/client/dom-ready';

/**
 * Application entrypoint
 */
domReady(async () => {
  // ...existing code...
  // Product gallery
  document.addEventListener('DOMContentLoaded', function() {
    const gallery = document.querySelector('.product-gallery');
    if (gallery) {
      const mainImage = gallery.querySelector('.main-image');
      const thumbs = gallery.querySelectorAll('.gallery-thumb');
      
      thumbs.forEach(thumb => {
        thumb.addEventListener('click', function() {
          const fullSrc = this.dataset.full;
          mainImage.src = fullSrc;
          
          // Update active state
          thumbs.forEach(t => t.classList.remove('active'));
          this.classList.add('active');
        });
      });
    }
  });
  // ...existing code...
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
