<div class="wrap">

	<h1 class="wp-heading-inline"><?php echo __('Post Types', 'acpt'); ?></h1>

	<a href="?page=acpt&amp;action=add" class="page-title-action"><?php echo __('Add', 'acpt'); ?></a>

	<hr class="wp-header-end">

	<?php

	// added
	if(acpt_get_notification() === 'acpt-post-type-added') {

		echo '<div class="acpt-notice">';
		echo __('Post Type has been successfully added.', 'acpt');
		echo '</div>';

	}

	// deleted
	if(acpt_get_notification() === 'acpt-post-type-deleted') {

		echo '<div class="acpt-notice">';
		echo __('Post Type has been deleted.', 'acpt');
		echo '</div>';

	}

	// insufficient
	if(acpt_get_notification() === 'acpt-post-type-insufficient') {

		echo '<div class="acpt-notice acpt-red-notice">';
		echo __('You did not fill in the required fields.', 'acpt');
		echo '</div>';

	}

	acpt_clear_notification();

	?>
