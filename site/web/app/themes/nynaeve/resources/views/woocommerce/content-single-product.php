<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<section class="image-and-short-description relative mb-10">
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 mx-auto max-md:px-2" id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
    
    <div class="img">
      <div class="img-box h-full max-lg:mx-auto">
        <?php do_action('woocommerce_before_single_product_summary'); ?>
      </div>
    </div>

    <div class="short-description data w-full lg:pr-8 pr-0 xl:justify-start justify-center flex items-start max-lg:pb-10 xl:my-2 lg:my-5 my-0">
      <div class="data w-full max-w-xl">
        <?php
          $categories = wc_get_product_category_list(get_the_ID());
          if ($categories) {
            echo '<p class="text-lg font-medium leading-8 text-indigo-600 mb-4">' . strip_tags($categories) . '</p>';
          }
        ?>
        
        <div class="summary entry-summary font-open-sans text-bgGray">
          <?php do_action('woocommerce_single_product_summary'); ?>
        </div>
      </div>
    </div>

  </div>
</section>
<section class="full-description relative mb-16">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold mb-6 font-open-sans">Detailed Description</h2>
    <div class="prose max-w-none">
      <?php the_content(); ?>
    </div>
  </div>
</section>

<?php do_action('woocommerce_after_single_product'); ?>
