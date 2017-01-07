<form method="post" class="acpt-form-container">

	<div class="acpt-form-box">

		<div class="acpt-form-row">

			<label><?php echo __('Post Type Name', 'acpt'); ?></label>
			<input type="text" name="acpt-post-type-name">

			<div class="acpt-form-row-description">

				<p>
					<?php echo __('Max 20 characters, can not contain capital letters or spaces.', 'acpt'); ?>
					<div class="acpt-form-row-example"><?php echo __('e.g. essay', 'acpt'); ?></div>
				</p>

			</div>

		</div>

		<div class="acpt-form-row">

			<label><?php echo __('Post Type Label', 'acpt'); ?></label>
			<input type="text" name="acpt-post-type-label">

			<div class="acpt-form-row-description">

				<div class="acpt-form-row-example"><?php echo __('e.g. Essays', 'acpt'); ?></div>

			</div>

		</div>

		<div class="acpt-form-row">

			<label><?php echo __('Post Type Singular Label', 'acpt'); ?></label>
			<input type="text" name="acpt-post-type-singular-label">

			<div class="acpt-form-row-description">

				<div class="acpt-form-row-example"><?php echo __('e.g. Essay', 'acpt'); ?></div>

			</div>

		</div>

		<div class="acpt-form-row">

			<label><?php echo __('Post Type Description (optional)', 'acpt'); ?></label>
			<textarea name="acpt-post-type-description"></textarea>

		</div>

	</div>

	<div class="acpt-form-box">

		<div class="acpt-form-row">

			<label><?php echo __('Show in admin', 'acpt'); ?></label>
			<select name="acpt-post-type-show-in-admin">
				<option value="yes"><?php echo __('Yes', 'acpt'); ?></option>
				<option value="no"><?php echo __('No', 'acpt'); ?></option>
			</select>

		</div>

		<div class="acpt-form-row">

			<label><?php echo __('Rewrite (optional)', 'acpt'); ?></label>
			<input type="text" name="acpt-post-type-rewrite">

			<div class="acpt-form-row-description">

				<div class="acpt-form-row-example"><?php echo __('e.g. essay', 'acpt'); ?></div>

			</div>

		</div>

		<div class="acpt-form-row">

			<label><?php echo __('Capability type', 'acpt'); ?></label>
			<select name="acpt-post-type-capability-type">
				<option value="post"><?php echo __('Post', 'acpt'); ?></option>
				<option value="page"><?php echo __('Page', 'acpt'); ?></option>
			</select>

		</div>

		<div class="acpt-form-row">

			<label><?php echo __('Has archive', 'acpt'); ?></label>
			<select name="acpt-post-type-has-archive">
				<option value="yes"><?php echo __('Yes', 'acpt'); ?></option>
				<option value="no"><?php echo __('No', 'acpt'); ?></option>
			</select>

		</div>

		<div class="acpt-form-row">

			<label><?php echo __('Hierarchical', 'acpt'); ?></label>
			<select name="acpt-post-type-hierarchical">
				<option value="yes"><?php echo __('Yes', 'acpt'); ?></option>
				<option value="no"><?php echo __('No', 'acpt'); ?></option>
			</select>

		</div>

		<div class="acpt-form-row">

			<label><?php echo __('Supports (optional)', 'acpt'); ?></label>

			<input type="checkbox" name="acpt-post-type-supports-title" value="support_title"> <span class="acpt-checkbox-span"><?php echo __('Title', 'acpt'); ?></span><br>
			<input type="checkbox" name="acpt-post-type-supports-editor" value="support_editor"> <span class="acpt-checkbox-span"><?php echo __('Editor', 'acpt'); ?></span><br>
			<input type="checkbox" name="acpt-post-type-supports-author" value="support_author"> <span class="acpt-checkbox-span"><?php echo __('Author', 'acpt'); ?></span><br>
			<input type="checkbox" name="acpt-post-type-supports-thumbnail" value="support_thumbnail"> <span class="acpt-checkbox-span"><?php echo __('Thumbnail', 'acpt'); ?></span><br>
			<input type="checkbox" name="acpt-post-type-supports-excerpt" value="support_excerpt"> <span class="acpt-checkbox-span"><?php echo __('Excerpt', 'acpt'); ?></span><br>
			<input type="checkbox" name="acpt-post-type-supports-comments" value="support_comments"> <span class="acpt-checkbox-span"><?php echo __('Comments', 'acpt'); ?></span><br>

		</div>

		<div class="acpt-form-row">

			<input class="button button-primary button-large" type="submit" name="acpt-add-form-submit" value="<?php echo __('Add', 'acpt'); ?>">

		</div>

	</div>

</form>
