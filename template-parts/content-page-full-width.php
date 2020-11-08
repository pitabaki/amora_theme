<?php
/**
 * Template part for displaying page content in page_full-width.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Amora_Meals
 */

?>

<?php

	remove_filter( 'the_content', 'wpautop' );

  /**
   * Standard Header
   */

  require_once(__DIR__ . "/../inc/standard_hero.php");

  $blog_id = get_the_ID();
  $standard_hero_header = standard_hero($blog_id);
	
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php echo $standard_hero_header; ?> <!-- .entry-header -->

	<div class="entry-content">
        <?php
        the_content();

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'amora-meals' ),
                'after'  => '</div>',
            )
        );
        ?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'amora-meals' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->