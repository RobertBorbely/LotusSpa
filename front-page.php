<?php

if ( get_option( 'show_on_front' ) == 'posts' ) {
    get_template_part( 'index' );
} elseif ( 'page' == get_option( 'show_on_front' ) ) {

get_header(); ?>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!--Indicators
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>-->

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="http://pandinawithlove.com/wp-content/uploads/2014/11/spa-cosmetici.jpg" alt="..." width="1920" height="500">
                <div class="carousel-caption">
                    <h3>Lotus is a perfekt choose for healthcare and spa blogs!</h3>
                </div>
            </div>
            <div class="item">
                <img src="http://pandinawithlove.com/wp-content/uploads/2014/11/slider-29.jpg" alt="...">
                <div class="carousel-caption">
                    <h3>It comes with custom social buttons and logo!</h3>
                </div>
            </div>
            <div class="item">
                <img src="http://pandinawithlove.com/wp-content/uploads/2014/11/spa-clavelez-slider1.jpg" alt="...">
                <div class="carousel-caption">
                    <h3>Beautiful minimalist design and layout!</h3>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>

        </a>
    </div> <!-- Carousel -->
    <div class="container space-holder">
        <img src="http://www.smaragdnails.com/wp-content/uploads/2014/11/Választó.jpg"></img>
    </div>

        <div class = "col-md-12">
                <?php $the_query = new WP_Query( 'showposts=1' ); ?>
                <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                        <?php if (is_sticky()) { ?>
                            <div class="blog-item-wrap">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                                    <?php the_post_thumbnail( 'full', array( 'class' => 'single-featured' )); ?>
                                </a>
                                <div class="post-inner-content">
                                    <h1 class="text-center entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
                                    <div class="text-center entry-meta">
                                        <?php lotus_by_eagles_posted_on() ?> <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                                            <span class="comments-link"><i class="fa fa-comments icon"></i><?php comments_popup_link( __( 'Leave a comment', 'lotus-by-eagles' ), __( '1 Comment', 'lotus-by-eagles' ), __( '% Comments', 'lotus-by-eagles' ) ); ?></span>
                                        <?php endif; ?>

                                        <?php edit_post_link( __( 'Edit', 'lotus-by-eagles' ), '<i class="fa fa-pencil-square-o icon"></i><span class="edit-link">', '</span>' ); ?>
                                    </div>
                                    <p class="text-justify"><?php the_excerpt();?></p>
                                </div>
                            </div>
                        <?php } ?>
                <?php endwhile;?>
        </div>
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12 ">
                <div class="thumbnail">
                    <a href="#" class="single-featured"><img src="http://placehold.it/600x600" alt="..."></a>
                    <div class="caption text-center">
                        <h3>Lorem Ipsum</h3>
                        <p>Lorem Ipsum Lorem Ipsum Takon Lorem faszom már ide ;)</p>
                        <a href="#" class="btn btn-default" role="button">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="thumbnail">
                    <a href="#" class="single-featured"><img src="http://placehold.it/600x600" alt="..."></a>
                    <div class="caption text-center">
                        <h3>Lorem Ipsum</h3>
                        <p>Lorem Ipsum Lorem Ipsum Takon Lorem faszom már ide ;)</p>
                        <a href="#" class="btn btn-default" role="button">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="thumbnail">
                    <a href="#" class="single-featured"><img src="http://placehold.it/600x600" alt="..."></a>
                    <div class="caption text-center">
                        <h3>Lorem Ipsum</h3>
                        <p>Lorem Ipsum Lorem Ipsum Takon Lorem faszom már ide ;)</p>
                        <a href="#" class="btn btn-default" role="button">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="thumbnail">
                    <a href="#" class="single-featured"><img src="http://placehold.it/600x600" alt="..."></a>
                    <div class="caption text-center">
                        <h3>Lorem Ipsum</h3>
                        <p>Lorem Ipsum Lorem Ipsum Takon Lorem faszom már ide ;)</p>
                        <a href="#" class="btn btn-default" role="button">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        </div>


<?php
get_footer(); }?>
