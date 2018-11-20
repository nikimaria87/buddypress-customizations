<?php
/* 
* This function was started by https://webdevstudios.com and I have added my own touch. The
* The original code by WebDevStudios can be found at https://gist.github.com/modemlooper/fb70735dd78de7cd2032.
* To get help in setting up the code on your website, visit https://nikimariadesigns.com/blog
*/
/*
* Creating custom menu option to display sample content to BuddyPress Users.
*/
function bp_custom_user_nav_item() {
    global $bp;

    $args = array(
            'name' => __('Sample', 'buddypress'), //swap out sample for the menu item name you wish to use
            'slug' => 'sample', //set the menu slug here
            'default_subnav_slug' => 'sample',
            'position' => 50,
            'screen_function' => 'bp_custom_user_nav_item_screen',
            'item_css_id' => 'sample'
    );

    bp_core_new_nav_item( $args );
}
add_action( 'bp_setup_nav', 'bp_custom_user_nav_item', 99 );

/**
 * the calback function from our nav item arguments
 */
function bp_custom_user_nav_item_screen() {
    add_action( 'bp_template_content', 'bp_custom_screen_content' );
    bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}

/**
 * the function hooked to bp_template_content, this hook is in plugns.php.  The hook 
 * will call the content of the My Exams page to the navigation item. 
*/

function bp_custom_screen_content() {
	$my_id = 28; //Post ID can be found in URL when editing the page or post
	$post_id_28 = get_post($my_id); //swap out 28 for the id in the $my_id field
	$content = $post_id_28->post_content; 
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]>', $content);
	echo $content;
	
}

?>
