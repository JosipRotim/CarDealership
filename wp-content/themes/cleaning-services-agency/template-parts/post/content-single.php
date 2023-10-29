<?php
/**
 * @package Cleaning Services Agency
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
    <?php if (has_post_thumbnail() ){ ?>
        <div class="post-thumb">
           <?php the_post_thumbnail(); ?>
        </div>
    <?php } ?>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
    <div class="clearfix"></div>
    <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'cleaning-services-agency' ),
            'after'  => '</div>',
        ) );
    ?>
    <footer class="entry-meta">
        <?php edit_post_link( __( 'Edit', 'cleaning-services-agency' ), '<span class="edit-link">', '</span>' ); ?>
    </footer>
</article>