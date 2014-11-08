<?php
/*
function ubercoool_snippets() {
	register_post_type('snippet', array(
		'public'	=> true,
		'label'		=> 'Snippet',
		'labels'	=> array('add_new_item' => 'Add New Snippet'),
		'supports'	=> array('title', 'editor', 'comments', 'thumbnail'),
		'taxonomies'=> array('post_tag')
	));
}
add_action('init', 'ubercoool_snippets');
*/

function add_post_type($name, $args = array()) {
	add_action('init', function() use($name, $args) {
		$upper	= ucwords($name);
		$name	= strtolower(str_replace(' ', '_', $name));
		
		$args	= array_merge(
			array(
				'public'	=> true,
				'label'		=> "All $upper" . 's',
				'labels'	=> array('add_new_item' => "Add New $upper"),
				'supports'	=> array('title', 'editor', 'comments')
			),
			$args
		);
	
		register_post_type($name, $args);
	}); 
}



function add_taxonomy($name, $post_type, $args = array() ) {
	$name = strtolower($name);
	add_action('init', function() use($name, $post_type, $args) {
		$args = array_merge(
			array(
				'label'	=> ucwords($name)
			),
			$args
		);
	// name of taxanomy, associated post type, options
		register_taxonomy($name, $post_type, $args);
	});
}

add_action('add_meta_boxes', function() {
		
		add_meta_box(
			'ubercoool_snippet_info',
			'Snippet Info',
			'ubercoool_snippet_info_cb',
			'snippet',
			'normal',
			'high'	
	);
});

function ubercoool_snippet_info_cb() {
		global $post;
		$url = get_post_meta($post->ID, 'ubercoool_associated_url', true);
		
		wp_nonce_field(__FILE__, 'ubercoool_nonce');

	?>
	<label for="ubercoool_associated_url">Associated URL: </label>
	<input type="text" name="ubercoool_associated_url" id="ubercoool_associated_url" class="widefat" value="<?php echo $url; ?>">
	<?php
}

add_action('save_post', function() {
	global $post;
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	
	if($_POST && !wp_verify_nonce($_POST['ubercoool_nonce'], __FILE__)) {
			if(isset($_POST['ubercoool_associated_url']) ) {
				update_post_meta($post->ID, 'ubercoool_associated_url', $_POST['ubercoool_associated_url']);
		}
	}
	
});


