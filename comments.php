<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 */
 
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
// if ( post_password_required() )
//     return;
?>

<style>
.comment-reply-link {
    display: none;
}
.comments-title {
    font-size: 1.3em;
    font-weight: bold;
}
</style>

<div id="comments" class="comments-area">
    
    <?php comment_form(array(
        'label_submit' => __( 'Submit comment' ),
        'class_submit' => 'btn btn-primary',
        'title_reply'       => __( '<h4>Add a Comment</h4>' ),
        'comment_field' => '<div class="form-group">
            <label for="comment">Comment ' . ( $req ? '<span class="required">*</span>' : '' ) . '</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
        </div>',
        'fields' => array(
            'author' =>
                '<div class="form-group comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) .
                ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
                '<input class="form-control" id="author" name="author" type="text" autocomplete="off" value="' . esc_attr( $commenter['comment_author'] ) .
                '" ' . ' /></div>',

            'email' =>
                '<div class="form-group comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) .
                ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
                '<input class="form-control" id="email" name="email" type="text" autocomplete="off" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" ' . ' /></div>',

            'url' =>
                '<div class="form-group comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
                '<input class="form-control" id="url" name="url" type="text" autocomplete="off" value="' . esc_attr( $commenter['comment_author_url'] ) .
                '" /></p>'),
    )); ?>
 
    <?php if ( have_comments() ) : ?>
        <h3 class="comments-title">
        Comments
            <?php
                // printf( _nx( 'One comment on "%2$s"', '%1$s thoughts on "%2$s"', get_comments_number(), 'comments title', 'luna' ),
                //     number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
        </h3>
 
        <ol class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 74,
                ) );
            ?>
        </ol><!-- .comment-list -->

        <?php
            // Are there comments to navigate through?
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
        <nav class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'luna' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'luna' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'luna' ) ); ?></div>
        </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>
 
        <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php _e( 'Comments are closed.' , 'luna' ); ?></p>
        <?php endif; ?>
 
    <?php endif; // have_comments() ?>
 
    
 
</div><!-- #comments -->


