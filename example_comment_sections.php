<?php
/***MODIFIED COMMENTS TEMPLATE FILE FOR TWENTY TEN THEME (VERSION 1.3)***
* @Author: Boutros AbiChedid 
* @Date:   February 22, 2012
* @Websites: bacsoftwareconsulting.com/ ; blueoliveonline.com/
* @Description: This is a Modified Comments template file that separates 
* Comments from Pings (Trackbacks and Pingbacks).
* The original Twenty Ten 'commments.php' file does not separate comments 
* from Pings. 
* @Tested on: WordPress version 3.3.1 
**************************************************************************/
 
/**
 * Twenty Ten Theme. The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to twentyten_comment which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
<div id="comments">
<?php if ( post_password_required() ) : ?>
    <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'twentyten' ); ?></p>
    </div><!-- #comments -->
<?php
    /* Stop the rest of comments.php from being processed,
    * but don't kill the script entirely -- we still have
    * to fully load the template.
    */
        return;
    endif;
?>
 
<?php
    // You can start editing here -- including this comment!
?>
 
<?php if ( have_comments() ) : ?>
 
    <!-- COMMENTS SECTION -->
    <h3 id="comments-title"><?php
    //comments_only_count() is a custom function that must be added to 'functions.php' file.
    printf( _n( 'One Comment to %2$s', '%1$s Comments to %2$s', comments_only_count($count), 'twentyten' ),
    number_format_i18n( comments_only_count($count) ), '<em>' . get_the_title() . '</em>' );
    ?></h3>
     <ol class="commentlist">
        <?php 
        /* Loop through and list the comments. Tell wp_list_comments()
         * to use twentyten_comment() to format the comments.
         * If you want to overload this in a child theme then you can
         * define twentyten_comment() and that will be used instead.
         * See twentyten_comment() in twentyten/functions.php for more.
         */
         //It is important that the wp_list_comments is placed before the comment navigation (if it exists). 
         //Otherwise, the comment navigation/pagination will be wrong.
        wp_list_comments('type=comment&callback=twentyten_comment');
        ?>
    </ol>
 
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
    <div class="navigation">
    <div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'twentyten' ) ); ?></div>
    <div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
    </div> <!-- .navigation -->
<?php endif; // check for comment navigation ?>
         
<!-- PINGS (TRACKBACKS & PINGBACKS) SECTION -->
<?php 
//If there are No pings, don't display the header and the navigation. One reason is that get_comment_pages_count() function is used to calculate the
//total number of comments pages. It does not separate for pings. So when the count is 0, the navigation still shows and it mimics the comments 
//section. Second reson if there are no Pings, then why display the header. 
    if ((get_comments_number() - comments_only_count($count)) > 0) { 
 
    echo '<h3 id="comments-title">';
    printf( _n( 'One Ping to %2$s', '%1$s Pings to %2$s', get_comments_number() - comments_only_count($count), 'twentyten' ),
    number_format_i18n( get_comments_number() - comments_only_count($count) ), '<em>' . get_the_title() . '</em>' );
    echo '</h3>'?>
 
    <ol class="commentlist">
        <?php
        wp_list_comments('type=pings&callback=twentyten_comment');
        ?>
    </ol>
    <?php 
        //get_pings_pages_count() is a custom function that must be added to 'functions.php' file.
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there Comments to navigate through? ?>
          
        <div class="navigation">
        <div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Pings', 'twentyten' ) ); ?></div>
        <div class="nav-next"><?php next_comments_link( __( 'Newer Pings <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
        </div><!-- .navigation -->  
                         
        <?php endif; // check for comment navigation ?>
<?php } ?>
 
<?php else : // or, if we don't have comments:
 
    /* If there are no comments and comments are closed,
     * let's leave a little note, shall we?
     */
    if ( ! comments_open() ) :
?>
    <p class="nocomments"><?php _e( 'Comments are closed.', 'twentyten' ); ?></p>
<?php endif; // end ! comments_open() ?>
 
<?php endif; // end have_comments() ?>
 
<?php comment_form(); ?>
</div><!-- #comments -->
