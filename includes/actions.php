<?php

/* Load text domain */
add_action('init', function() {

	load_plugin_textdomain('acpt', false, 'post-types/languages');

});

/* Add Custom Post Types menu item to the Tools menu */
add_action('admin_menu', function() {

	add_submenu_page('tools.php', __('Post Types', 'acpt'), __('Post Types', 'acpt'), 'manage_options', 'acpt', 'acpt_admin');

});

/* Stylesheet */
add_action('admin_enqueue_scripts', function() {

	wp_enqueue_style('acpt', plugins_url('/assets/css/style.css', __DIR__ . '../', '', time()));

});

/* Load post types */
add_action('init', function() {

	acpt_register_post_types();

});

/* Delete post type */
add_action('admin_init', function() {

	if(!empty($_GET['action']) && $_GET['action'] === 'delete' && !empty($_GET['post_type_name'])) {

		$post_type_name = $_GET['post_type_name'];
		$option_name = 'acpt_post_type_' . str_replace('acpt_', '', $post_type_name);
		$site_admin_url = admin_url('/tools.php?page=acpt&notice=acpt-post-type-deleted');

		if(is_multisite()) {

			$site_admin_url = get_admin_url(get_current_blog_id(), '/tools.php?page=acpt&amp;notice=acpt-post-type-deleted');

		}

		delete_option($option_name);
		wp_safe_redirect($site_admin_url);

		exit();

	}

});

/* Add post type */
add_action('init', function() {

	if(!empty($_POST['acpt-add-form-submit'])) {

		$acpt_required_data = [
			'acpt-post-type-name',
			'acpt-post-type-label',
			'acpt-post-type-singular-label',
			'acpt-post-type-show-in-admin',
			'acpt-post-type-capability-type',
			'acpt-post-type-has-archive',
			'acpt-post-type-hierarchical'
		];

		$acpt_features = [];

		if(isset($_POST['acpt-post-type-supports-title'])) {

			$acpt_features[] = 'title';

		}

		if(isset($_POST['acpt-post-type-supports-editor'])) {

			$acpt_features[] = 'editor';

		}

		if(isset($_POST['acpt-post-type-supports-author'])) {

			$acpt_features[] = 'author';

		}

		if(isset($_POST['acpt-post-type-supports-thumbnail'])) {

			$acpt_features[] = 'thumbnail';

		}

		if(isset($_POST['acpt-post-type-supports-excerpt'])) {

			$acpt_features[] = 'excerpt';

		}

		if(isset($_POST['acpt-post-type-supports-comments'])) {

			$acpt_features[] = 'comments';

		}

		$acpt_data = [
			'name' => sanitize_text_field($_POST['acpt-post-type-name']),
			'label' => sanitize_text_field($_POST['acpt-post-type-label']),
			'singular_label' => sanitize_text_field($_POST['acpt-post-type-singular-label']),
			'description' => sanitize_text_field($_POST['acpt-post-type-description']),
			'show_in_admin' => sanitize_text_field($_POST['acpt-post-type-show-in-admin']),
			'rewrite' => sanitize_text_field($_POST['acpt-post-type-rewrite']),
			'capability_type' => sanitize_text_field($_POST['acpt-post-type-capability-type']),
			'has_archive' => sanitize_text_field($_POST['acpt-post-type-has-archive']),
			'hierarchical' => sanitize_text_field($_POST['acpt-post-type-hierarchical']),
			'supports' => $acpt_features
		];

		$not_passed = false;

		foreach($_POST as $key => $value) {

			if(in_array($key, $acpt_required_data)) {

				if(empty($value)) {

					$not_passed = true;

				}

			}

		}

		if(!$not_passed) {

			// store
			add_option('acpt_post_type_' . $acpt_data['name'], json_encode($acpt_data), '', 'yes');

			$site_admin_url = admin_url('/tools.php?page=acpt');

			if(is_multisite()) {

				$site_admin_url = get_admin_url(get_current_blog_id(), '/tools.php?page=acpt');

			}

			acpt_set_notification('acpt-post-type-added');

			wp_safe_redirect($site_admin_url);

			exit();

		} else {

			// show notification error, not enough data to work with
			$site_admin_url = admin_url('/tools.php?page=acpt');

			if(is_multisite()) {

				$site_admin_url = get_admin_url(get_current_blog_id(), '/tools.php?page=acpt');

			}

			acpt_set_notification('acpt-post-type-insufficient');

			wp_safe_redirect($site_admin_url);

			exit();

		}

	}

});
