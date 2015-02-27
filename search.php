<?php
/**
 * The template for displaying search results pages.
 *
 * @package Lotus by Eagles
 */

get_header(); ?>
<?php if ( is_active_sidebar('sidebar-1') ) { ?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main col-lg-9 col-md-9 col-sm-9 col-xs-12 text-justify" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header text-center">
				<h1 class="page-title "><?php printf( __( 'Search Results for: %s', 'lotus-by-eagles' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

			<?php lotus_by_eagles_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
        <div class = "col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <?php get_sidebar(); ?>
        </div>
	</section><!-- #primary -->

<?php } else { ?>
    <section id="primary" class="content-area">
        <main id="main" class="site-main text-justify" role="main">

            <?php lotus_by_eagles_post_layout2(); ?>

        </main><!-- #main -->
    </section><!-- #primary -->

<?php }; ?>
<?php get_footer(); ?>

