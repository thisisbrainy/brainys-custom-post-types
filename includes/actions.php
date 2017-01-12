<?php

/* Load text domain */
add_action('init', function() {

	load_plugin_textdomain('bcpt', false, 'brainys-custom-post-types/languages');

});

/* Add Custom Post Types menu item to the Tools menu */
add_action('admin_menu', function() {

	add_submenu_page('tools.php', __('Post Types', 'bcpt'), __('Post Types', 'bcpt'), 'manage_options', 'bcpt', 'bcpt_admin');

});

/* Stylesheet */
add_action('admin_enqueue_scripts', function() {

	wp_enqueue_style('bcpt', plugins_url('/assets/css/style.css', __DIR__ . '../', '', time()));

});

/* Load post types */
add_action('init', function() {

	bcpt_register_post_types();

});

/* Delete post type */
add_action('admin_init', function() {

	if(!empty($_GET['action']) && $_GET['action'] === 'delete' && !empty($_GET['post_type_name'])) {

		$post_type_name = $_GET['post_type_name'];
		$option_name = 'bcpt_post_type_' . str_replace('bcpt_', '', $post_type_name);
		$site_admin_url = admin_url('/tools.php?page=bcpt');

		if(is_multisite()) {

			$site_admin_url = get_admin_url(get_current_blog_id(), '/tools.php?page=bcpt');

		}

		bcpt_set_notification('bcpt-post-type-deleted');
		delete_option($option_name);
		wp_safe_redirect($site_admin_url);

		exit();

	}

});

/* Add post type */
add_action('init', function() {

	if(!empty($_POST['bcpt-add-form-submit'])) {

		$bcpt_features = [];

		if(isset($_POST['bcpt-post-type-supports-title'])) {

			$bcpt_features[] = 'title';

		}

		if(isset($_POST['bcpt-post-type-supports-editor'])) {

			$bcpt_features[] = 'editor';

		}

		if(isset($_POST['bcpt-post-type-supports-author'])) {

			$bcpt_features[] = 'author';

		}

		if(isset($_POST['bcpt-post-type-supports-thumbnail'])) {

			$bcpt_features[] = 'thumbnail';

		}

		if(isset($_POST['bcpt-post-type-supports-excerpt'])) {

			$bcpt_features[] = 'excerpt';

		}

		if(isset($_POST['bcpt-post-type-supports-comments'])) {

			$bcpt_features[] = 'comments';

		}

		$bcpt_data = [];
		$not_passed = false;

		// Post Type Name
		if(isset($_POST['bcpt-post-type-name'])) {

			$bcpt_data['name'] = sanitize_text_field($_POST['bcpt-post-type-name']);

		} else {

			$not_passed = true;

		}

		// Post Type Label
		if(isset($_POST['bcpt-post-type-label'])) {

			$bcpt_data['label'] = sanitize_text_field($_POST['bcpt-post-type-label']);

		} else {

			$not_passed = true;

		}

		// Post Type Singular Label
		if(isset($_POST['bcpt-post-type-singular-label'])) {

			$bcpt_data['singular_label'] = sanitize_text_field($_POST['bcpt-post-type-singular-label']);

		} else {

			$not_passed = true;

		}

		// Post Type Description
		if(isset($_POST['bcpt-post-type-description'])) {

			$bcpt_data['description'] = sanitize_text_field($_POST['bcpt-post-type-description']);

		} else {

			$not_passed = true;

		}

		// Post Type Show in Admin
		if(isset($_POST['bcpt-post-type-show-in-admin'])) {

			$bcpt_data['show_in_admin'] = sanitize_text_field($_POST['bcpt-post-type-show-in-admin']);

		} else {

			$not_passed = true;

		}

		// Post Type Rewrite
		if(isset($_POST['bcpt-post-type-rewrite'])) {

			$bcpt_data['rewrite'] = sanitize_text_field($_POST['bcpt-post-type-rewrite']);

		} else {

			$not_passed = true;

		}

		// Post Type Capability Type
		if(isset($_POST['bcpt-post-type-capability-type'])) {

			$bcpt_data['capability_type'] = sanitize_text_field($_POST['bcpt-post-type-capability-type']);

		} else {

			$not_passed = true;

		}

		// Post Type Has Archive
		if(isset($_POST['bcpt-post-type-has-archive'])) {

			$bcpt_data['has_archive'] = sanitize_text_field($_POST['bcpt-post-type-has-archive']);

		} else {

			$not_passed = true;

		}

		// Post Type Hierarchical
		if(isset($_POST['bcpt-post-type-hierarchical'])) {

			$bcpt_data['hierarchical'] = sanitize_text_field($_POST['bcpt-post-type-hierarchical']);

		} else {

			$not_passed = true;

		}

		// Post Type Supports
		$bcpt_data['supports'] = $bcpt_features;

		if(!$not_passed) {

			// store
			add_option('bcpt_post_type_' . $bcpt_data['name'], json_encode($bcpt_data), '', 'yes');

			$site_admin_url = admin_url('/tools.php?page=bcpt');

			if(is_multisite()) {

				$site_admin_url = get_admin_url(get_current_blog_id(), '/tools.php?page=bcpt');

			}

			bcpt_set_notification('bcpt-post-type-added');

			wp_safe_redirect($site_admin_url);

			exit();

		} else {

			// show notification error, not enough data to work with
			$site_admin_url = admin_url('/tools.php?page=bcpt');

			if(is_multisite()) {

				$site_admin_url = get_admin_url(get_current_blog_id(), '/tools.php?page=bcpt');

			}

			bcpt_set_notification('bcpt-post-type-insufficient');

			wp_safe_redirect($site_admin_url);

			exit();

		}

	}

});
