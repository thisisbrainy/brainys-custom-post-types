<div class="wrap">

	<h1 class="wp-heading-inline"><?php echo __('Post Types', 'bcpt'); ?></h1>

	<a href="?page=bcpt&amp;action=add" class="page-title-action"><?php echo __('Add', 'bcpt'); ?></a>

	<hr class="wp-header-end">

	<?php

	// added
	if(bcpt_get_notification() === 'bcpt-post-type-added') {

		echo '<div class="bcpt-notice">';
		echo __('Post Type has been successfully added.', 'bcpt');
		echo '</div>';

	}

	// deleted
	if(bcpt_get_notification() === 'bcpt-post-type-deleted') {

		echo '<div class="bcpt-notice">';
		echo __('Post Type has been deleted.', 'bcpt');
		echo '</div>';

	}

	// insufficient
	if(bcpt_get_notification() === 'bcpt-post-type-insufficient') {

		echo '<div class="bcpt-notice bcpt-red-notice">';
		echo __('You did not fill in the required fields.', 'bcpt');
		echo '</div>';

	}

	bcpt_clear_notification();

	?>
