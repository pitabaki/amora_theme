<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Amora_Meals
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container-fluid">
			<div class="site-branding">
				<a href="/" class="navbar-brand mr-0 mr-md-2" rel="home" aria-current="page">
					<img src="/wp-content/themes/amora_theme/img/amora-meals-logo--footer.svg" class="navbar-logo d-block" alt="Amora Meals" height="229.38" width="371.3">
				</a>
			</div><!-- .site-branding -->
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://amorameals.com/', 'amora-meals' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( '&copy; %s', 'amora-meals' ), 'Amora Meals' );
					?>
				</a>
				<span class="sep"> | </span>
					<?php
					printf( esc_html__( 'Hit us up by phone %1$s or by email %2$s.', 'amora-meals' ), '<a href="tel:858.598.4674">‪(858) 598-4674‬</a>', '<a href="mailto:govegan@amorameals.com">govegan@amorameals.com</a>' );
					?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
