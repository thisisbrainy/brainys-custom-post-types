<?php

/* Set notification */
function bcpt_set_notification($message) {

	$_SESSION['bcpt_message'] = $message;

}

/* Get notification */
function bcpt_get_notification() {

	if(!empty($_SESSION['bcpt_message'])) {

		return $_SESSION['bcpt_message'];

	}

	return false;

}

/* Clear notification */
function bcpt_clear_notification() {

	unset($_SESSION['bcpt_message']);

}

/* Get all post types created with this plugin */
function bcpt_post_types() {

	$options = wp_load_alloptions();
	$bcpt_post_types = [];

	foreach($options as $name => $value) {

		if(stristr($name, 'bcpt_post_type_')) {

			$bcpt_post_types[$name] = $value;

		}

	}

	return $bcpt_post_types;

}

/* Register post types */
function bcpt_register_post_types() {

	$post_types = bcpt_post_types();

	foreach($post_types as $post_type) {

		$data = json_decode($post_type);
		$pt_public = false;
		$pt_rewrite = false;
		$pt_supports = $data->supports;

		if($data->show_in_admin === 'yes') {

			$pt_public = true;

		}

		if($data->rewrite !== '') {

			$pt_rewrite = ['slug' => $data->rewrite];

		}

		register_post_type('bcpt_' . $data->name, [
			'labels' => [
				'name' => $data->label,
				'singular_name' => $data->singular_label
			],
			'description' => $data->description,
			'public' => $pt_public,
			'publicly_queryable' => true,
			'show_ui' => $pt_public,
			'show_in_menu' => $pt_public,
			'query_var' => true,
			'rewrite' => $pt_rewrite,
			'capability_type' => $data->capability_type,
			'has_archive' => $data->has_archive,
			'hierarchical' => $data->hierarchical,
			'supports' => $pt_supports
		]);

	}

}

/* Admin view */
function bcpt_admin() {

	// define $action
	$action = false;

	if(!empty($_GET['action'])) {

		$action = $_GET['action'];

	}

	// require head section
	require BCPT_DIR . '/views/partials/header.php';

	// views
	if($action === 'add') {

		require BCPT_DIR . '/views/add.php';

	}

	if($action === 'edit') {

		require BCPT_DIR . '/views/edit.php';

	}

	if(!$action) {

		require BCPT_DIR . '/views/index.php';

	}

	// require footer section
	require BCPT_DIR . '/views/partials/footer.php';

}
