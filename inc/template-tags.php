<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Lotus by Eagles
 */

if ( ! function_exists( 'lotus_by_eagles_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function lotus_by_eagles_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'lotus-by-eagles' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<i class="fa fa-chevron-left"></i> Older posts', 'lotus-by-eagles' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer Posts <i class="fa fa-chevron-right"></i>', 'lotus-by-eagles' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'lotus_by_eagles_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function lotus_by_eagles_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'lotus-by-eagles' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<i class="fa fa-chevron-left"></i>&nbsp;%title', 'Previous post link', 'lotus-by-eagles' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<i class="fa fa-chevron-right"></i>', 'Next post link',     'lotus-by-eagles' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'lotus_by_eagles_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function lotus_by_eagles_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( '<i class="fa fa-calendar icon"></i> %s', 'post date', 'lotus-by-eagles' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( '<i class="fa fa-user icon"></i> %s', 'post author', 'lotus-by-eagles' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';


}
endif;

if ( ! function_exists( 'lotus_by_eagles_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function lotus_by_eagles_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'lotus-by-eagles' ) );
		if ( $categories_list && lotus_by_eagles_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( 'Posted in %1$s ', 'lotus-by-eagles' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'lotus-by-eagles' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s ', 'lotus-by-eagles' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'lotus-by-eagles' ), __( '1 Comment', 'lotus-by-eagles' ), __( '% Comments', 'lotus-by-eagles' ) );
		echo '</span>';
	}


}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function lotus_by_eagles_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'lotus_by_eagles_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'lotus_by_eagles_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so lotus_by_eagles_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so lotus_by_eagles_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in lotus_by_eagles_categorized_blog.
 */
function lotus_by_eagles_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'lotus_by_eagles_categories' );
}
add_action( 'edit_category', 'lotus_by_eagles_category_transient_flusher' );
add_action( 'save_post',     'lotus_by_eagles_category_transient_flusher' );
