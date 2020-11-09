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

	<footer id="colophon" class="site-footer pt-5 pb-0 pl-0 pr-0">
		<div class="container-fluid">
			<div class="row p-5">
				<div class="site-branding col-lg-2 col-md-12 pb-5">
					<a href="/" class="navbar-brand mr-0 mr-md-2" rel="home" aria-current="page">
						<img src="/wp-content/themes/amora_theme/img/amora-meals-logo--footer.svg" class="navbar-logo d-block" alt="Amora Meals" height="229.38" width="371.3">
					</a>
				</div><!-- .site-branding -->
				<div class="col-lg-4 col-md-6">
					<h3>Contact us:</h3>
					<table>
						<tr>
							<td><i class="fa fa-map"></i></td>
							<td><strong>Amora Meals</strong><br>
							<a href="https://goo.gl/maps/tFDAf6hZce5NMSh39" target="_blank" rel="nofollow">3852 Mission Blvd<br>
							San Diego, CA 92109</a><br></td>
						</tr>
						<tr>
							<td><i class="fa fa-phone"></i></td>
							<td><a href="tel:‪1-858-598-4674‬">‪(858) 598-4674‬</a></td>
						</tr>
						<tr>
							<td><i class="fa fa-envelope"></i></td>
							<td><a href="govegan@amorameals.com">govegan@amorameals.com</a></td>
						</tr>
					</table>
					<h3>Follow us:</h3>
					<div class="social-media"><a href="https://www.instagram.com/amorameals/" class="fa fa-instagram" target="_blank" rel="no-follow"></a>
					<a href="https://twitter.com/AmoraMeals" class="fa fa-twitter" target="_blank" rel="no-follow"></a></div>
					</p>
				</div>
				<div class="col-lg-6 col-md-6">
					<h2>About us:</h2>
					<p>Amora Meals’ founders are a brother-sister team, <a href="https://www.linkedin.com/in/peter-berki-8a583b1a/" target="_blank" rel="nofollow">Peter</a> and Monica Berki. During the United States Coronavirus shutdown, the siblings came up with the idea of a plant-based meal plan system that rewards its users with contribution points.
					<br><br>
					Partnering with local gourmet chefs, the siblings began piecing together a meal plan and pricing model. Monica worked with the chefs to ensure their recipes were on-par with our high-standards; Peter worked with designers to get our branding together. They ironed out a contribution model together, ensuring a portion of profit would go to non-profit organizations.</p>
				</div><!-- .site-info -->
			</div>
			<div class="row pt-4 pb-4 pl-5 pr-5">
				<div class="site-info col-md-12">
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
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
