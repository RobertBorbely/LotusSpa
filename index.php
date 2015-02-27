<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lotus by Eagles
 */

get_header(); ?>
<!--<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!--Indicators
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>-->

    <!-- Wrapper for slides
    <div class="carousel-inner">
        <div class="item active">
            <img src="http://placehold.it/1920x500" alt="...">
            <div class="carousel-caption">
                <h3>Caption Text</h3>
            </div>
        </div>
        <div class="item">
            <img src="http://placehold.it/1920x500" alt="...">
            <div class="carousel-caption">
                <h3>Caption Text</h3>
            </div>
        </div>
        <div class="item">
            <img src="http://placehold.it/1920x500" alt="...">
            <div class="carousel-caption">
                <h3>Caption Text</h3>
            </div>
        </div>
    </div>

    <!-- Controls
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>

    </a>
</div> <!-- Carousel -->

<?php if ( is_active_sidebar('sidebar-1') ) { ?>
	<div id="primary" class="content-area container-fluid">
		<main id="main" class="site-main col-lg-9 col-md-9 col-sm-9 col-xs-12 text-justify" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
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

	</div><!-- #primary -->

<?php } else { ?>
    <div id="primary" class="content-area container-blog">
        <main id="main" class="site-main text-justify col-md-12" role="main">

            <?php if ( have_posts() ) : ?>

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php
                    /* Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'content', get_post_format() );
                    ?>

                <?php endwhile; ?>

                <?php lotus_by_eagles_paging_nav(); ?>

            <?php else : ?>

                <?php get_template_part( 'content', 'none' ); ?>

            <?php endif; ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php }; ?>
<?php get_footer(); ?>
