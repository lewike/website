<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

try {
    \Roots\bootloader();
} catch (Throwable $e) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://docs.roots.io/acorn/2.x/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/*
|--------------------------------------------------------------------------
| Enable Sage Theme Support
|--------------------------------------------------------------------------
|
| Once our theme files are registered and available for use, we are almost
| ready to boot our application. But first, we need to signal to Acorn
| that we will need to initialize the necessary service providers built in
| for Sage when booting.
|
*/

add_theme_support('sage');

function custom_comment($comment, $args, $depth)
{
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

    $commenter          = wp_get_current_commenter();
    $show_pending_links = ! empty( $commenter['comment_author'] );

    if ( $commenter['comment_author_email'] ) {
        $moderation_note = __( 'Your comment is awaiting moderation.' );
    } else {
        $moderation_note = __( 'Your comment is awaiting moderation. This is a preview; your comment will be visible after it has been approved.' );
    }
    ?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( 'parent', $comment ); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <div class="comment-meta">
                <div class="comment-author vcard">
                    <?php
                    if ( 0 != $args['avatar_size'] ) {
                        echo get_avatar( $comment, $args['avatar_size'] );
                    }
                    ?>
                    <?php
                    $comment_author = get_comment_author_link( $comment );

                    if ( '0' == $comment->comment_approved && ! $show_pending_links ) {
                        $comment_author = get_comment_author( $comment );
                    }

                    printf(
                        /* translators: %s: Comment author link. */
                        __( '%s' ),
                        sprintf( '<b class="fn">%s</b>', $comment_author )
                    );
                    ?>
                </div><!-- .comment-author -->

                <div class="comment-metadata">
                    <?php
                    printf(
                        '<a href="%s"><time datetime="%s">%s</time></a>',
                        esc_url( get_comment_link( $comment, $args ) ),
                        get_comment_time( 'c' ),
                        sprintf(
                            /* translators: 1: Comment date, 2: Comment time. */
                            __( '%1$s at %2$s' ),
                            get_comment_date( '', $comment ),
                            get_comment_time()
                        )
                    );

                    edit_comment_link( __( 'Edit' ), ' <span class="edit-link">', '</span>' );
                    ?>
                </div><!-- .comment-metadata -->

                <?php if ( '0' == $comment->comment_approved ) : ?>
                <em class="comment-awaiting-moderation"><?php echo $moderation_note; ?></em>
                <?php endif; ?>
            </div><!-- .comment-meta -->

            <div class="comment-content">
                <?php comment_text(); ?>
            </div><!-- .comment-content -->

            <?php
            if ( '1' == $comment->comment_approved || $show_pending_links ) {
                comment_reply_link(
                    array_merge(
                        $args,
                        array(
                            'add_below' => 'div-comment',
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth'],
                            'before'    => '<div class="reply">',
                            'after'     => '</div>',
                        )
                    )
                );
            }
            ?>
        </article><!-- .comment-body -->
    <?php
}
