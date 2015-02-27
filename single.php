<?php
/**
 * The template for displaying all single posts.
 *
 * @package Lotus by Eagles
 */

get_header(); ?>
<?php if ( is_active_sidebar('sidebar-1') ) { ?>
	<div id="primary" class="content-area container-fluid">
		<main id="main" class="site-main col-lg-9 col-md-9 col-sm-9 col-xs-12" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', 'single' ); ?>

                    <?php lotus_by_eagles_post_nav(); ?>

                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>

                <?php endwhile; // end of the loop. ?>


		</main><!-- #main -->
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <?php get_sidebar(); ?>
        </div>
	</div><!-- #primary -->

<?php } else { ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="col-md-12">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', 'single' ); ?>

                    <?php lotus_by_eagles_post_nav(); ?>

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                    ?>

                <?php endwhile; // end of the loop. ?>

            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php }; ?>
<?php get_footer(); ?>
