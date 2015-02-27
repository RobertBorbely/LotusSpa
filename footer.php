<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Lotus by Eagles
 */
?>

	</div><!-- #content -->

	<footer class="nav navbar-inverse navbar-static-top footer-bar" role="contentinfo">
        <div class="container">



			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'lotus-by-eagles' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'lotus-by-eagles' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'lotus-by-eagles' ), 'Lotus by Eagles', '<a href="http://underscores.me/" rel="designer">Róbert Borbély</a>' ); ?>

        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
