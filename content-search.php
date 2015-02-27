<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lotus by Eagles
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-item-wrap">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
            <?php the_post_thumbnail( 'full', array( 'class' => 'single-featured' )); ?>
        </a>

        <div class="post-inner-content">
            <header class="entry-header text-center">
                <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

                <?php if ( 'post' == get_post_type() ) : ?>
                    <div class="entry-meta">
                        <?php lotus_by_eagles_posted_on(); ?><?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                            <span class="comments-link"><i class="fa fa-comments icon"></i><?php comments_popup_link( __( 'Leave a comment', 'lotus-by-eagles' ), __( '1 Comment', 'lotus-by-eagles' ), __( '% Comments', 'lotus-by-eagles' ) ); ?></span>
                        <?php endif; ?>

                        <?php edit_post_link( __( 'Edit', 'lotus-by-eagles' ), '<i class="fa fa-pencil-square-o icon"></i><span class="edit-link">', '</span>' ); ?>

                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->

            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->

            <footer class="entry-footer">
                <?php lotus_by_eagles_entry_footer(); ?>
            </footer><!-- .entry-footer -->

        </div>
    </div>
</article><!-- #post-## -->
