<?php

/* Set notification */
function acpt_set_notification($message) {

	$_SESSION['acpt_message'] = $message;

}

/* Get notification */
function acpt_get_notification() {

	if(!empty($_SESSION['acpt_message'])) {

		return $_SESSION['acpt_message'];

	}

	return false;

}

/* Clear notification */
function acpt_clear_notification() {

	unset($_SESSION['acpt_message']);

}

/* Get all post types created with this plugin */
function acpt_post_types() {

	$options = wp_load_alloptions();
	$acpt_post_types = [];

	foreach($options as $name => $value) {

		if(stristr($name, 'acpt_post_type_')) {

			$acpt_post_types[$name] = $value;

		}

	}

	return $acpt_post_types;

}

/* Register post types */
function acpt_register_post_types() {

	$post_types = acpt_post_types();

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

		register_post_type('acpt_' . $data->name, [
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
function acpt_admin() {

	// define $reserved
	$reserved = [
		'post',
		'page',
		'attachment',
		'revision',
		'nav_menu_item',
		'custom_css',
		'customize_changeset',
		'product',
		'product_variation',
		'shop_order',
		'shop_order_refund',
		'shop_coupon',
		'shop_webhook'
	];

	// define $action
	$action = false;

	if(!empty($_GET['action'])) {

		$action = $_GET['action'];

	}

	// require head section
	require ACPT_DIR . '/views/partials/header.php';

	// views
	if($action === 'add') {

		require ACPT_DIR . '/views/add.php';

	}

	if($action === 'edit') {

		require ACPT_DIR . '/views/edit.php';

	}

	if(!$action) {

		require ACPT_DIR . '/views/index.php';

	}

	// require footer section
	require ACPT_DIR . '/views/partials/footer.php';

}
