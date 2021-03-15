<?php
/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">

	<div class="hero-image--container">

		<?php 
		//HERO IMAGE FETCHING
			$heroImage = get_theme_mod('allianz_hero_image', false);

			if($heroImage) {
				echo wp_get_attachment_image($heroImage,[1600,900],false,array(
					'class' => 'hero-image--image',
					'alt' => 'Großes Einführungsbild der Homepage'
				));
			}
		?>
	</div>

	<div class="stories--container">
		
		<?php

		$props = ['left','right'];

            foreach ($props as $prop) {
                $post_id = get_theme_mod('allianz_'.$prop.'_column', false);
                if ($post_id !== false) {
                    $left_post = get_post($post_id);
                    $left_title = $left_post->post_title;
                    $left_title = apply_filters('the_title', $left_title);
                    $left_content = $left_post->post_content;
                    $left_content = apply_filters('the_content', $left_content);
                } ?>
		<article class="stories--<?=$prop;?>">
		<h3 class="stories--title"><?=($left_title ?? "");?></h3>
		
			<?=($left_content ?? ""); ?>
		</article>
		<?php
            } 
		?>
	</div>
	

	<aside class="sponsoring--bar">
		<?php
			dynamic_sidebar( 'Sponsoring' ); ?>
		</aside>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
