<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Lotus by Eagles
 */
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="row">
        <div class="blog-item-wrap">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                <?php the_post_thumbnail( 'full', array( 'class' => 'single-featured' )); ?>
            </a>
            <div class="post-inner-content">
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php the_content(); ?>
                    <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . __( 'Pages:', 'lotus-by-eagles' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <?php edit_post_link( __( 'Edit', 'lotus-by-eagles' ), '<span class="edit-link">', '</span>' ); ?>
                </footer><!-- .entry-footer -->

            </div>
        </div>
    </article>



