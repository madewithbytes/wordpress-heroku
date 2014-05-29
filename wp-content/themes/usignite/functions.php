<?php
/**
 * US Ignite theme functions and definitions
 *
 * @package WordPress
 * @subpackage US Ignite
 */


add_action( 'after_setup_theme', 'usignite_setup' );

if ( ! function_exists( 'usignite_setup' ) ):

function usignite_setup() {

///////////////////////////////////////////// This theme uses Featured Images (also known as post thumbnails)
	add_theme_support( 'post-thumbnails' );
	add_theme_support('menus');
	
	add_action('init','register_main_menu');	
}
endif;


///////////////////////////////////////////////////////////////////////////// This theme uses custom menus
function register_main_menu(){
register_nav_menu('main_menu',__('Main Menu'));
}

///////////////////////////////////////////////////////////////////////Set-up excerpts and "continue reading" links
function usignite_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'usignite' ) . '</a>';
}

function usignite_auto_excerpt_more( $more ) {
	return ' &hellip;' . usignite_continue_reading_link();
}
add_filter( 'excerpt_more', 'usignite_auto_excerpt_more' );

function usignite_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= usignite_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'usignite_custom_excerpt_more' );



///////////////////////////////////////////////////////////////////////Register sidebars and widgetized areas.
function usignite_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'usignite' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Showcase Sidebar', 'usignite' ),
		'id' => 'sidebar-2',
		'description' => __( 'The sidebar for the optional Showcase Template', 'usignite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'usignite_widgets_init' );


///////////////////////////////////////////////////////Display navigation to next/previous pages when applicable
function usignite_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>" class='clearfix'>
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'usignite' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'usignite' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'usignite' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}


if ( ! function_exists( 'usignite_posted_on' ) ) :
		
//////////////////////////////////////Prints HTML with meta information for the current post-date/time and author.
function usignite_posted_on() {
	printf( __( 'Posted on <time class="entry-date" datetime="%3$s" pubdate>%4$s</time>', 'usignite' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
}
endif;


//////////////////////////////////////////////////////////// Generate new post type for Annoucements

add_action( 'init', 'register_cpt_announcement' );

function register_cpt_announcement() {

    $labels = array( 
        'name' => _x( 'Announcements', 'announcement' ),
        'singular_name' => _x( 'Announcement', 'announcement' ),
        'add_new' => _x( 'Add New', 'announcement' ),
        'add_new_item' => _x( 'Add New Announcement', 'announcement' ),
        'edit_item' => _x( 'Edit Announcement', 'announcement' ),
        'new_item' => _x( 'New Announcement', 'announcement' ),
        'view_item' => _x( 'View Announcement', 'announcement' ),
        'search_items' => _x( 'Search Announcements', 'announcement' ),
        'not_found' => _x( 'No announcements found', 'announcement' ),
        'not_found_in_trash' => _x( 'No announcements found in Trash', 'announcement' ),
        'parent_item_colon' => _x( 'Parent Announcement:', 'announcement' ),
        'menu_name' => _x( 'Announcements', 'announcement' ),
    );


$args = array( 
    'labels' => $labels,
    'hierarchical' => false,
    'description' => 'Post type created to add Announcements to the rotator on the bottom left of the home page.',
    'supports' => array( 'title', 'editor', 'thumbnail' ),
    
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    
    
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => false,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'
);

	    register_post_type( 'announcement', $args );
	}
	
	///////////////////////////////////////////////////////////// Add custom meta box for Announcement Link

	add_action( 'admin_menu', 'create_announcement_link_meta_box' );
	add_action( 'save_post', 'save_announcement_link_meta_box', 10, 2 );

	function create_announcement_link_meta_box() {
		add_meta_box( 'announcement_link-meta-box', 'Announcement Link', 'announcement_link_meta_box', 'announcement', 'normal', 'low' );
	}

	function announcement_link_meta_box( $object, $box ) { ?>
		<p>
			<label for="announceLink">Announcement Link</label>
			<br />
			<textarea name="announceLink" id="announceLink" cols="60" rows=2" tabindex="30" style="width: 97%;"><?php echo wp_specialchars( get_post_meta( $object->ID, 'Announcement Link', true ), 1 ); ?></textarea>
			<input type="hidden" name="announcement_link_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</p>
	<?php }

	function save_announcement_link_meta_box( $post_id, $post ) {

		if ( !wp_verify_nonce( $_POST['announcement_link_meta_box_nonce'], plugin_basename( __FILE__ ) ) )
			return $post_id;

		if ( !current_user_can( 'edit_post', $post_id ) )
			return $post_id;

		$meta_value = get_post_meta( $post_id, 'Announcement Link', true );
		$new_meta_value = stripslashes( $_POST['announceLink'] );

		if ( $new_meta_value && '' == $meta_value )
			add_post_meta( $post_id, 'Announcement Link', $new_meta_value, true );

		elseif ( $new_meta_value != $meta_value )
			update_post_meta( $post_id, 'Announcement Link', $new_meta_value );

		elseif ( '' == $new_meta_value && $meta_value )
			delete_post_meta( $post_id, 'Announcement Link', $meta_value );
	}
	
	///////////////////////////////////////////////////////////// Add custom meta box for Announcement Subhead

	add_action( 'admin_menu', 'create_announcement_subhead_meta_box' );
	add_action( 'save_post', 'save_announcement_subhead_meta_box', 10, 2 );

	function create_announcement_subhead_meta_box() {
		add_meta_box( 'announcement_subhead-meta-box', 'Image Sub-Header', 'announcement_subhead_meta_box', 'announcement', 'normal', 'low' );
	}

	function announcement_subhead_meta_box( $object, $box ) { ?>
		<p>
			<label for="announceLink">Image Sub-Header</label>
			<br />
			<textarea name="announceSubhead" id="announceSubhead" cols="60" rows=2" tabindex="30" style="width: 97%;"><?php echo wp_specialchars( get_post_meta( $object->ID, 'Image Sub-Header', true ), 1 ); ?></textarea>
			<input type="hidden" name="announcement_subhead_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</p>
	<?php }

	function save_announcement_subhead_meta_box( $post_id, $post ) {

		if ( !wp_verify_nonce( $_POST['announcement_subhead_meta_box_nonce'], plugin_basename( __FILE__ ) ) )
			return $post_id;

		if ( !current_user_can( 'edit_post', $post_id ) )
			return $post_id;

		$meta_value = get_post_meta( $post_id, 'Image Sub-Header', true );
		$new_meta_value = stripslashes( $_POST['announceSubhead'] );

		if ( $new_meta_value && '' == $meta_value )
			add_post_meta( $post_id, 'Image Sub-Header', $new_meta_value, true );

		elseif ( $new_meta_value != $meta_value )
			update_post_meta( $post_id, 'Image Sub-Header', $new_meta_value );

		elseif ( '' == $new_meta_value && $meta_value )
			delete_post_meta( $post_id, 'Image Sub-Header', $meta_value );
	}



///////////////////////////////////////////////////// Generate new post type for Whitepapers


add_action( 'init', 'register_cpt_whitepaper' );

function register_cpt_whitepaper() {

    $labels = array( 
        'name' => _x( 'Whitepapers', 'whitepaper' ),
        'singular_name' => _x( 'Whitepaper', 'whitepaper' ),
        'add_new' => _x( 'Add New', 'whitepaper' ),
        'add_new_item' => _x( 'Add New Whitepaper', 'whitepaper' ),
        'edit_item' => _x( 'Edit Whitepaper', 'whitepaper' ),
        'new_item' => _x( 'New Whitepaper', 'whitepaper' ),
        'view_item' => _x( 'View Whitepaper', 'whitepaper' ),
        'search_items' => _x( 'Search Whitepapers', 'whitepaper' ),
        'not_found' => _x( 'No whitepapers found', 'whitepaper' ),
        'not_found_in_trash' => _x( 'No whitepapers found in Trash', 'whitepaper' ),
        'parent_item_colon' => _x( 'Parent Whitepaper:', 'whitepaper' ),
        'menu_name' => _x( 'Whitepapers', 'whitepaper' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Post type created to archive whitepapers.',
		'supports' => array( 'title', 'editor', 'tag' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		        'publicly_queryable' => true,
		        'exclude_from_search' => false,
		        'has_archive' => true,
		        'query_var' => true,
		        'can_export' => true,
		        'rewrite' => true,
		        'capability_type' => 'post',
				'taxonomy' => 'post_tag'
		    );

		    register_post_type( 'whitepaper', $args );
}
		
		add_action('init', 'whitepaper_add_tag_box');

		function whitepaper_add_tag_box() {
		    register_taxonomy_for_object_type('post_tag', 'whitepaper');
		}
		

///////////////////////////////////////////////////// Generate new post type for Opportunities


add_action( 'init', 'register_cpt_opportunity' );

function register_cpt_opportunity() {

    $labels = array( 
        'name' => _x( 'Opportunities', 'opportunity' ),
        'singular_name' => _x( 'Opportunity', 'opportunity' ),
        'add_new' => _x( 'Add New', 'opportunity' ),
        'add_new_item' => _x( 'Add New Opportunity', 'opportunity' ),
        'edit_item' => _x( 'Edit Opportunity', 'opportunity' ),
        'new_item' => _x( 'New Opportunity', 'opportunity' ),
        'view_item' => _x( 'View Opportunity', 'opportunity' ),
        'search_items' => _x( 'Search Opportunities', 'opportunity' ),
        'not_found' => _x( 'No opportunities found', 'opportunity' ),
        'not_found_in_trash' => _x( 'No opportunities found in Trash', 'opportunity' ),
        'parent_item_colon' => _x( 'Parent Opportunity:', 'opportunity' ),
        'menu_name' => _x( 'Opportunities', 'opportunity' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post',
		'taxonomy' => 'post_tag'
    );

    register_post_type( 'opportunity', $args );
}

add_action('init', 'opportunity_add_tag_box');

function opportunity_add_tag_box() {
    register_taxonomy_for_object_type('post_tag', 'opportunity');
}


///////////////////////////////////////////////////// Generate new post type for Workshops


add_action( 'init', 'register_cpt_workshop' );

function register_cpt_workshop() {

    $labels = array( 
        'name' => _x( 'Workshops', 'workshop' ),
        'singular_name' => _x( 'Workshop', 'workshop' ),
        'add_new' => _x( 'Add New', 'workshop' ),
        'add_new_item' => _x( 'Add New Workshop', 'workshop' ),
        'edit_item' => _x( 'Edit Workshop', 'workshop' ),
        'new_item' => _x( 'New Workshop', 'workshop' ),
        'view_item' => _x( 'View Workshop', 'workshop' ),
        'search_items' => _x( 'Search Workshops', 'workshop' ),
        'not_found' => _x( 'No workshops found', 'workshop' ),
        'not_found_in_trash' => _x( 'No workshops found in Trash', 'workshop' ),
        'parent_item_colon' => _x( 'Parent Workshop:', 'workshop' ),
        'menu_name' => _x( 'Workshops', 'workshop' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post',
		'taxonomy' => 'post_tags'
    );

    register_post_type( 'workshop', $args );
}

add_action('init', 'workshop_add_tag_box');

function workshop_add_tag_box() {
    register_taxonomy_for_object_type('post_tag', 'workshop');
}


///////////////////////////////////////////////////// Generate new post type for Staff


add_action( 'init', 'register_cpt_staff' );

function register_cpt_staff() {

    $labels = array( 
        'name' => _x( 'Staff', 'staff' ),
        'singular_name' => _x( 'Staff', 'staff' ),
        'add_new' => _x( 'Add New', 'staff' ),
        'add_new_item' => _x( 'Add New Staff', 'staff' ),
        'edit_item' => _x( 'Edit Staff', 'staff' ),
        'new_item' => _x( 'New Staff', 'staff' ),
        'view_item' => _x( 'View Staff', 'staff' ),
        'search_items' => _x( 'Search Staff', 'staff' ),
        'not_found' => _x( 'No staff found', 'staff' ),
        'not_found_in_trash' => _x( 'No staff found in Trash', 'staff' ),
        'parent_item_colon' => _x( 'Parent Staff:', 'staff' ),
        'menu_name' => _x( 'Staff', 'staff' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'staff', $args );
}
		
///////////////////////////////////////////////////////////// Add custom meta box for Position Title for Staff

add_action( 'admin_menu', 'create_staff_position_meta_box' );
add_action( 'save_post', 'save_staff_position_meta_box', 10, 2 );

function create_staff_position_meta_box() {
	add_meta_box( 'staff_position-meta-box', 'Position Title', 'staff_position_meta_box', 'staff', 'normal', 'low' );
}

function staff_position_meta_box( $object, $box ) { ?>
	<p>
		<label for="staffPosition">Position Title</label>
		<br />
		<textarea name="staffPosition" id="staffPosition" cols="60" rows=2" tabindex="30" style="width: 97%;"><?php echo wp_specialchars( get_post_meta( $object->ID, 'Position Title', true ), 1 ); ?></textarea>
		<input type="hidden" name="staff_position_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</p>
<?php }

function save_staff_position_meta_box( $post_id, $post ) {

	if ( !wp_verify_nonce( $_POST['staff_position_meta_box_nonce'], plugin_basename( __FILE__ ) ) )
		return $post_id;

	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	$meta_value = get_post_meta( $post_id, 'Position Title', true );
	$new_meta_value = stripslashes( $_POST['staffPosition'] );

	if ( $new_meta_value && '' == $meta_value )
		add_post_meta( $post_id, 'Position Title', $new_meta_value, true );

	elseif ( $new_meta_value != $meta_value )
		update_post_meta( $post_id, 'Position Title', $new_meta_value );

	elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, 'Position Title', $meta_value );
}


///////////////////////////////////////////////////// Generate new post type for Board Members


add_action( 'init', 'register_cpt_board' );

function register_cpt_board() {

    $labels = array( 
        'name' => _x( 'Board Members', 'board' ),
        'singular_name' => _x( 'Board Member', 'board' ),
        'add_new' => _x( 'Add New', 'board' ),
        'add_new_item' => _x( 'Add New Board Member', 'board' ),
        'edit_item' => _x( 'Edit Board Member', 'board' ),
        'new_item' => _x( 'New Board Member', 'board' ),
        'view_item' => _x( 'View Board Member', 'board' ),
        'search_items' => _x( 'Search Board Members', 'board' ),
        'not_found' => _x( 'No board members found', 'board' ),
        'not_found_in_trash' => _x( 'No board members found in Trash', 'board' ),
        'parent_item_colon' => _x( 'Parent Board Member:', 'board' ),
        'menu_name' => _x( 'Board Members', 'board' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'board', $args );
}

		
///////////////////////////////////////////////////////////// Add custom meta box for Title for Board

add_action( 'admin_menu', 'create_board_title_meta_box' );
add_action( 'save_post', 'save_board_title_meta_box', 10, 2 );

function create_board_title_meta_box() {
	add_meta_box( 'board_title-meta-box', 'Title', 'board_title_meta_box', 'board', 'normal', 'low' );
}

function board_title_meta_box( $object, $box ) { ?>
	<p>
		<label for="boardTitle">Title</label>
		<br />
		<textarea name="boardTitle" id="boardTitle" cols="60" rows=2" tabindex="30" style="width: 97%;"><?php echo wp_specialchars( get_post_meta( $object->ID, 'Title', true ), 1 ); ?></textarea>
		<input type="hidden" name="board_title_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</p>
<?php }

function save_board_title_meta_box( $post_id, $post ) {

	if ( !wp_verify_nonce( $_POST['board_title_meta_box_nonce'], plugin_basename( __FILE__ ) ) )
		return $post_id;

	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	$meta_value = get_post_meta( $post_id, 'Title', true );
	$new_meta_value = stripslashes( $_POST['boardTitle'] );

	if ( $new_meta_value && '' == $meta_value )
		add_post_meta( $post_id, 'Title', $new_meta_value, true );

	elseif ( $new_meta_value != $meta_value )
		update_post_meta( $post_id, 'Title', $new_meta_value );

	elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, 'Title', $meta_value );
}


///////////////////////////////////////////////////// Generate new post type for Sponsors


add_action( 'init', 'register_cpt_sponsor' );

function register_cpt_sponsor() {

    $labels = array( 
        'name' => _x( 'Sponsors', 'sponsor' ),
        'singular_name' => _x( 'Sponsor', 'sponsor' ),
        'add_new' => _x( 'Add New', 'sponsor' ),
        'add_new_item' => _x( 'Add New Sponsor', 'sponsor' ),
        'edit_item' => _x( 'Edit Sponsor', 'sponsor' ),
        'new_item' => _x( 'New Sponsor', 'sponsor' ),
        'view_item' => _x( 'View Sponsor', 'sponsor' ),
        'search_items' => _x( 'Search Sponsors', 'sponsor' ),
        'not_found' => _x( 'No sponsors found', 'sponsor' ),
        'not_found_in_trash' => _x( 'No sponsors found in Trash', 'sponsor' ),
        'parent_item_colon' => _x( 'Parent Sponsor:', 'sponsor' ),
        'menu_name' => _x( 'Sponsors', 'sponsor' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'thumbnail' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'sponsor', $args );
}


///////////////////////////////////////////////////////////// Add custom meta box for Sponsor Link

add_action( 'admin_menu', 'create_sponsor_link_meta_box' );
add_action( 'save_post', 'save_sponsor_link_meta_box', 10, 2 );

function create_sponsor_link_meta_box() {
	add_meta_box( 'sponsor_link-meta-box', 'Sponsor Link', 'sponsor_link_meta_box', 'sponsor', 'normal', 'low' );
}

function sponsor_link_meta_box( $object, $box ) { ?>
	<p>
		<label for="sponsorLink">Sponsor Link</label>
		<br />
		<textarea name="sponsorLink" id="sponsorLink" cols="60" rows=2" tabindex="30" style="width: 97%;"><?php echo wp_specialchars( get_post_meta( $object->ID, 'Sponsor Link', true ), 1 ); ?></textarea>
		<input type="hidden" name="sponsor_link_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</p>
<?php }

function save_sponsor_link_meta_box( $post_id, $post ) {

	if ( !wp_verify_nonce( $_POST['sponsor_link_meta_box_nonce'], plugin_basename( __FILE__ ) ) )
		return $post_id;

	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	$meta_value = get_post_meta( $post_id, 'Sponsor Link', true );
	$new_meta_value = stripslashes( $_POST['sponsorLink'] );

	if ( $new_meta_value && '' == $meta_value )
		add_post_meta( $post_id, 'Sponsor Link', $new_meta_value, true );

	elseif ( $new_meta_value != $meta_value )
		update_post_meta( $post_id, 'Sponsor Link', $new_meta_value );

	elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, 'Sponsor Link', $meta_value );
}


///////////////////////////////////////////////////// Generate new post type for Partners


add_action( 'init', 'register_cpt_partner' );

function register_cpt_partner() {

    $labels = array( 
        'name' => _x( 'Partners', 'partner' ),
        'singular_name' => _x( 'Partner', 'partner' ),
        'add_new' => _x( 'Add New', 'partner' ),
        'add_new_item' => _x( 'Add New Partner', 'partner' ),
        'edit_item' => _x( 'Edit Partner', 'partner' ),
        'new_item' => _x( 'New Partner', 'partner' ),
        'view_item' => _x( 'View Partner', 'partner' ),
        'search_items' => _x( 'Search Partners', 'partner' ),
        'not_found' => _x( 'No partners found', 'partner' ),
        'not_found_in_trash' => _x( 'No partners found in Trash', 'partner' ),
        'parent_item_colon' => _x( 'Parent Partner:', 'partner' ),
        'menu_name' => _x( 'Partners', 'partner' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'thumbnail' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'partner', $args );
}


///////////////////////////////////////////////////////////// Add custom meta box for Partner Link

add_action( 'admin_menu', 'create_partner_link_meta_box' );
add_action( 'save_post', 'save_partner_link_meta_box', 10, 2 );

function create_partner_link_meta_box() {
	add_meta_box( 'partner_link-meta-box', 'Partner Link', 'partner_link_meta_box', 'partner', 'normal', 'low' );
}

function partner_link_meta_box( $object, $box ) { ?>
	<p>
		<label for="partnerLink">Partner Link</label>
		<br />
		<textarea name="partnerLink" id="partnerLink" cols="60" rows=2" tabindex="30" style="width: 97%;"><?php echo wp_specialchars( get_post_meta( $object->ID, 'Partner Link', true ), 1 ); ?></textarea>
		<input type="hidden" name="partner_link_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</p>
<?php }

function save_partner_link_meta_box( $post_id, $post ) {

	if ( !wp_verify_nonce( $_POST['partner_link_meta_box_nonce'], plugin_basename( __FILE__ ) ) )
		return $post_id;

	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	$meta_value = get_post_meta( $post_id, 'Partner Link', true );
	$new_meta_value = stripslashes( $_POST['partnerLink'] );

	if ( $new_meta_value && '' == $meta_value )
		add_post_meta( $post_id, 'Partner Link', $new_meta_value, true );

	elseif ( $new_meta_value != $meta_value )
		update_post_meta( $post_id, 'Partner Link', $new_meta_value );

	elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, 'Partner Link', $meta_value );
}


///////////////////////////////////////////////////////////// Add custom meta box for Sub-Headlines on Pages

add_action( 'admin_menu', 'create_pages_subhead_meta_box' );
add_action( 'save_post', 'save_pages_subhead_meta_box', 10, 2 );

function create_pages_subhead_meta_box() {
	add_meta_box( 'pages-subhead-meta-box', 'Sub-Headline', 'pages_subhead_meta_box', 'page', 'normal', 'high' );
}

function pages_subhead_meta_box( $object, $box ) { ?>
	<p>
		<label for="subhead">Sub-Headline</label>
		<br />
		<textarea name="subhead" id="subhead" cols="60" rows=2" tabindex="30" style="width: 97%;"><?php echo wp_specialchars( get_post_meta( $object->ID, 'Sub-Headline', true ), 1 ); ?></textarea>
		<input type="hidden" name="pages_subhead_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</p>
<?php }

function save_pages_subhead_meta_box( $post_id, $post ) {

	if ( !wp_verify_nonce( $_POST['pages_subhead_meta_box_nonce'], plugin_basename( __FILE__ ) ) )
		return $post_id;

	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	$meta_value = get_post_meta( $post_id, 'Sub-Headline', true );
	$new_meta_value = stripslashes( $_POST['subhead'] );

	if ( $new_meta_value && '' == $meta_value )
		add_post_meta( $post_id, 'Sub-Headline', $new_meta_value, true );

	elseif ( $new_meta_value != $meta_value )
		update_post_meta( $post_id, 'Sub-Headline', $new_meta_value );

	elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, 'Sub-Headline', $meta_value );
}


////////////////////////////////////////////////////////////// Add custom meta box for Image Caption on Pages

define('WYSIWYG_META_BOX_ID', 'caption-editor');
define('WYSIWYG_EDITOR_ID', 'captionEditor'); //Important for CSS that this is different
define('WYSIWYG_META_KEY', 'image-caption');

add_action('admin_init', 'page_image_caption_meta_box');
function page_image_caption_meta_box(){
        add_meta_box(WYSIWYG_META_BOX_ID, __('Image Caption', 'imageCaption'), 'page_image_caption_render_meta_box', 'page');
}

function page_image_caption_render_meta_box(){

        global $post;
        
        $meta_box_id = WYSIWYG_META_BOX_ID;
        $editor_id = WYSIWYG_EDITOR_ID;
        
        //Add CSS & jQuery goodness to make this work like the original WYSIWYG
        echo "
                <style type='text/css'>
                        #$meta_box_id #edButtonHTML, #$meta_box_id #edButtonPreview {background-color: #F1F1F1; border-color: #DFDFDF #DFDFDF #CCC; color: #999;}
                        #$editor_id{width:100%;}
                        #$meta_box_id #editorcontainer{background:#fff !important;}
                        #$meta_box_id #$editor_id_fullscreen{display:none;}
                </style>
            
                <script type='text/javascript'>
                        jQuery(function($){
                                $('#$meta_box_id #editor-toolbar > a').click(function(){
                                        $('#$meta_box_id #editor-toolbar > a').removeClass('active');
                                        $(this).addClass('active');
                                });
                                
                                if($('#$meta_box_id #edButtonPreview').hasClass('active')){
                                        $('#$meta_box_id #ed_toolbar').hide();
                                }
                                
                                $('#$meta_box_id #edButtonPreview').click(function(){
                                        $('#$meta_box_id #ed_toolbar').hide();
                                });
                                
                                $('#$meta_box_id #edButtonHTML').click(function(){
                                        $('#$meta_box_id #ed_toolbar').show();
                                });

				//Tell the uploader to insert content into the correct WYSIWYG editor
				$('#media-buttons a').bind('click', function(){
					var customEditor = $(this).parents('#$meta_box_id');
					if(customEditor.length > 0){
						edCanvas = document.getElementById('$editor_id');
					}
					else{
						edCanvas = document.getElementById('content');
					}
				});
                        });
                </script>
        ";
        
        //Create The Editor
        $content = get_post_meta($post->ID, WYSIWYG_META_KEY, true);
        the_editor($content, $editor_id);
        
        //Clear The Room!
        echo "<div style='clear:both; display:block;'></div>";
}

add_action('save_post', 'page_image_caption_save_meta');
function page_image_caption_save_meta(){

        $editor_id = WYSIWYG_EDITOR_ID;
        $meta_key = WYSIWYG_META_KEY;

        if(isset($_REQUEST[$editor_id]))
                update_post_meta($_REQUEST['post_ID'], WYSIWYG_META_KEY, $_REQUEST[$editor_id]);
                
}


////////////////////////////////////////////////////////////// Add custom meta box for About Us Info

define('WYSIWYG_ABOUT_INFO_BOX_ID', 'about-editor');
define('WYSIWYG_ABOUT_EDITOR_ID', 'aboutEditor'); //Important for CSS that this is different
define('WYSIWYG_ABOUT_META_KEY', 'about-info');

add_action('admin_init', 'page_about_info_meta_box');
function page_about_info_meta_box(){
        add_meta_box(WYSIWYG_ABOUT_INFO_BOX_ID, __('About Us Information (for use on the What is US Ignite page only)', 'aboutInfo'), 'page_about_info_render_meta_box', 'page');
}

function page_about_info_render_meta_box(){

        global $post;
        
        $meta_box_id = WYSIWYG_ABOUT_INFO_BOX_ID;
        $editor_id = WYSIWYG_ABOUT_EDITOR_ID;

		//Add CSS & jQuery goodness to make this work like the original WYSIWYG
        echo "
                <style type='text/css'>
                        #$meta_box_id #edButtonHTML, #$meta_box_id #edButtonPreview {background-color: #F1F1F1; border-color: #DFDFDF #DFDFDF #CCC; color: #999;}
                        #$editor_id{width:100%;}
                        #$meta_box_id #editorcontainer{background:#fff !important;}
                        #$meta_box_id #$editor_id_fullscreen{display:none;}
                </style>
            
                <script type='text/javascript'>
                        jQuery(function($){
                                $('#$meta_box_id #editor-toolbar > a').click(function(){
                                        $('#$meta_box_id #editor-toolbar > a').removeClass('active');
                                        $(this).addClass('active');
                                });
                                
                                if($('#$meta_box_id #edButtonPreview').hasClass('active')){
                                        $('#$meta_box_id #ed_toolbar').hide();
                                }
                                
                                $('#$meta_box_id #edButtonPreview').click(function(){
                                        $('#$meta_box_id #ed_toolbar').hide();
                                });
                                
                                $('#$meta_box_id #edButtonHTML').click(function(){
                                        $('#$meta_box_id #ed_toolbar').show();
                                });

				//Tell the uploader to insert content into the correct WYSIWYG editor
				$('#media-buttons a').bind('click', function(){
					var customEditor = $(this).parents('#$meta_box_id');
					if(customEditor.length > 0){
						edCanvas = document.getElementById('$editor_id');
					}
					else{
						edCanvas = document.getElementById('content');
					}
				});
                        });
                </script>
        ";
        
        //Create The Editor
        $content = get_post_meta($post->ID, WYSIWYG_ABOUT_META_KEY, true);
        the_editor($content, $editor_id);
        
        //Clear The Room!
        echo "<div style='clear:both; display:block;'></div>";
}

add_action('save_post', 'page_about_info_save_meta');
function page_about_info_save_meta(){

        $editor_id = WYSIWYG_ABOUT_EDITOR_ID;
        $meta_key = WYSIWYG_ABOUT_META_KEY;

        if(isset($_REQUEST[$editor_id]))
                update_post_meta($_REQUEST['post_ID'], WYSIWYG_ABOUT_META_KEY, $_REQUEST[$editor_id]);
                
}




////////////////////////////////////////////////////////////////////////////// Add custom meta box for Pages
///////////////////////////////////////////////////////////////////////// for pullquote on Wide Image Pages

add_action( 'admin_menu', 'create_pullquote_meta_box' );
add_action( 'save_post', 'save_pullquote_meta_box', 10, 2 );

function create_pullquote_meta_box() {
	add_meta_box( 'pullquote-meta-box', 'Pull Quote', 'pullquote_meta_box', 'page', 'normal', 'low' );
}

function pullquote_meta_box( $object, $box ) { ?>
	<p>
		<label for="pullquote">Pull Quote</label>
		<br />
		<textarea name="pullquote" id="pullquote" cols="60" rows=2" tabindex="30" style="width: 97%;"><?php echo wp_specialchars( get_post_meta( $object->ID, 'Pull Quote', true ), 1 ); ?></textarea>
		<input type="hidden" name="pullquote_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</p>
<?php }

function save_pullquote_meta_box( $post_id, $post ) {

	if ( !wp_verify_nonce( $_POST['pullquote_meta_box_nonce'], plugin_basename( __FILE__ ) ) )
		return $post_id;

	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	$meta_value = get_post_meta( $post_id, 'Pull Quote', true );
	$new_meta_value = stripslashes( $_POST['pullquote'] );

	if ( $new_meta_value && '' == $meta_value )
		add_post_meta( $post_id, 'Pull Quote', $new_meta_value, true );

	elseif ( $new_meta_value != $meta_value )
		update_post_meta( $post_id, 'Pull Quote', $new_meta_value );

	elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, 'Pull Quote', $meta_value );
}



///////////////////////////////////////////////////////////////// Extra functions

function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

function the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}


add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if(is_category() || is_tag()) {
    $post_type = get_query_var('post_type');
	if($post_type){
	    $post_type = $post_type;
	}else{
	    $post_type = array('post','whitepaper', 'opportunity', 'workshop'); // replace cpt to your custom post type
    $query->set('post_type',$post_type);
	return $query;
	}
  }
}


///////////////////////////////////////////////////////////// Disable Contact Form 7 Scripts


function removecfScripts(){
	wp_deregister_script("contact-form-7");
	wp_deregister_script("jquery-form");
}

function my_deregister_styles() {
    wp_deregister_style( 'contact-form-7' );
}


add_action( 'wp_print_styles', 'my_deregister_styles', 100 );
add_action( 'wp_print_scripts', 'removecfScripts', 100 );


?>