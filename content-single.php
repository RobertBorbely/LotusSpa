<?php
/**
 * @package Lotus by Eagles
 */
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="blog-item-wrap">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                <?php the_post_thumbnail( 'full', array( 'class' => 'single-featured' )); ?>
            </a>
            <div class="post-inner-content">
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title text-center">', '</h1>' ); ?>

                    <div class="entry-meta">
                        <?php lotus_by_eagles_posted_on(); ?>
                        <?php edit_post_link( __( 'Edit', 'lotus-by-eagles' ), '<i class="fa fa-pencil-square-o icon"></i><span class="edit-link">', '</span>' ); ?>
                    </div><!-- .entry-meta -->
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
                    <?php lotus_by_eagles_entry_footer(); ?>
                </footer><!-- .entry-footer -->
            </div>
        </div>
    </article><!-- #post-## -->

