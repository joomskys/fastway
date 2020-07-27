<?php
/**
 * Move comment field to bottom
 */
function fastway_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;

	return $fields;
}
add_filter( 'comment_form_fields', 'fastway_comment_field_to_bottom' );

/**
 * Custom Comment List
 */
function fastway_comment_list( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
	?>
    <<?php echo ''.$tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		    <div class="comment-inner row">
		        <?php if ($args['avatar_size'] != 0) : ?>
		        	<div class="comment-avatar col-md-auto col-12"><?php
		        		echo get_avatar($comment, fastway_configs('cmt_avatar_size')); 
		        	?></div>
		        <?php endif; ?>
		        <div class="comment-content col">
		        	<div class="comment-meta">
		            	<span class="comment-date"><?php echo get_comment_date().' - '.get_comment_time(); ?></span>
		            </div>
		            <h4 class="comment-title"><?php printf( '%s', get_comment_author_link() ); ?></h4>
		            <div class="comment-text"><?php comment_text(); ?></div>
		            <div class="comment-reply"><?php 
		            	comment_reply_link( array_merge( $args, array(
							'add_below' => $add_below,
							'depth'     => $depth,
							'max_depth' => $args['max_depth']
						) ) ); 
					?></div>
		        </div>
		    </div>
		<?php if ( 'div' != $args['style'] ) : ?>
        </div>
	<?php endif;
}

function fastway_comment_reply_text( $link ) {
$link = str_replace( 'Reply', '<span>'.esc_html__('Reply', 'fastway').'</span>', $link );
return $link;
}
add_filter( 'comment_reply_link', 'fastway_comment_reply_text' );

/**
 * Comment form fields
**/
if(!function_exists('fastway_comment_form_args')){
	function fastway_comment_form_args($args = []){
		$args = wp_parse_args($args, []);
		$commenter = [
			'comment_author' => '',
			'comment_author_email' => ''
		];
		$fields = array(
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'title_reply'          => esc_attr__( 'Leave A Comment', 'fastway'),
			'title_reply_to'       => esc_attr__( 'Leave A Comment To ', 'fastway') . '%s',
			'cancel_reply_link'    => esc_attr__( 'Cancel Comment', 'fastway'),
			'label_submit'         => esc_attr__( 'Submit Comment', 'fastway'),
			'comment_notes_before' => '',
			'fields'               => apply_filters( 'comment_form_default_fields', array(

                    'author' =>'
                    	<div class="row"><div class="comment-form-field comment-form-author col-lg-4 col-md-4 col-sm-12">'.
                    	'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                    	'" size="30" placeholder="'.esc_attr__('Author', 'fastway').'"/></div>
                    ',

                    'email' =>'
                    	<div class="comment-form-field comment-form-email col-lg-4 col-md-4 col-sm-12">'.
                    	'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    	'" size="30" placeholder="'.esc_attr__('Email', 'fastway').'"/></div>
                    ',

                    'website' =>'
                    	<div class="comment-form-field comment-form-website col-lg-4 col-md-4 col-sm-12">'.
                    	'<input id="website" name="website" type="text" value="" size="30" placeholder="'.esc_attr__('Website', 'fastway').'"/></div></div>
                    ',
            	)
            ),
            'comment_field' =>  '<div class="row"><div class="comment-form-field comment-form-comment col-12"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.esc_attr__('Comment:', 'fastway').'" aria-required="true">' .
            '</textarea></div></div>',
    	);

    	return $fields;
	}
}