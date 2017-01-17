<form method="post" class="bcpt-form-container">

	<div class="bcpt-form-box">

		<div class="bcpt-form-row">

			<label><?php echo __('Post Type Name', 'bcpt'); ?></label>
			<input type="text" name="bcpt-post-type-name">

			<div class="bcpt-form-row-description">

				<p>
					<?php echo __('Max 20 characters, can not contain capital letters or spaces.', 'bcpt'); ?>
					<div class="bcpt-form-row-example"><?php echo __('e.g. essay', 'bcpt'); ?></div>
				</p>

			</div>

		</div>

		<div class="bcpt-form-row">

			<label><?php echo __('Post Type Label', 'bcpt'); ?></label>
			<input type="text" name="bcpt-post-type-label">

			<div class="bcpt-form-row-description">

				<div class="bcpt-form-row-example"><?php echo __('e.g. Essays', 'bcpt'); ?></div>

			</div>

		</div>

		<div class="bcpt-form-row">

			<label><?php echo __('Post Type Singular Label', 'bcpt'); ?></label>
			<input type="text" name="bcpt-post-type-singular-label">

			<div class="bcpt-form-row-description">

				<div class="bcpt-form-row-example"><?php echo __('e.g. Essay', 'bcpt'); ?></div>

			</div>

		</div>

		<div class="bcpt-form-row">

			<label><?php echo __('Post Type Description (optional)', 'bcpt'); ?></label>
			<textarea name="bcpt-post-type-description"></textarea>

		</div>

	</div>

	<div class="bcpt-form-box">

		<div class="bcpt-form-row">

			<label><?php echo __('Show in admin', 'bcpt'); ?></label>
			<select name="bcpt-post-type-show-in-admin">
				<option value="yes"><?php echo __('Yes', 'bcpt'); ?></option>
				<option value="no"><?php echo __('No', 'bcpt'); ?></option>
			</select>

		</div>

		<div class="bcpt-form-row">

			<label><?php echo __('Rewrite (optional)', 'bcpt'); ?></label>
			<input type="text" name="bcpt-post-type-rewrite">

			<div class="bcpt-form-row-description">

				<div class="bcpt-form-row-example"><?php echo __('e.g. essay', 'bcpt'); ?></div>

			</div>

		</div>

		<div class="bcpt-form-row">

			<label><?php echo __('Capability type', 'bcpt'); ?></label>
			<select name="bcpt-post-type-capability-type">
				<option value="post"><?php echo __('Post', 'bcpt'); ?></option>
				<option value="page"><?php echo __('Page', 'bcpt'); ?></option>
			</select>

		</div>

		<div class="bcpt-form-row">

			<label><?php echo __('Has archive', 'bcpt'); ?></label>
			<select name="bcpt-post-type-has-archive">
				<option value="yes"><?php echo __('Yes', 'bcpt'); ?></option>
				<option value="no"><?php echo __('No', 'bcpt'); ?></option>
			</select>

		</div>

		<div class="bcpt-form-row">

			<label><?php echo __('Hierarchical', 'bcpt'); ?></label>
			<select name="bcpt-post-type-hierarchical">
				<option value="yes"><?php echo __('Yes', 'bcpt'); ?></option>
				<option value="no"><?php echo __('No', 'bcpt'); ?></option>
			</select>

		</div>

		<div class="bcpt-form-row">

			<label><?php echo __('Supports (optional)', 'bcpt'); ?></label>

			<input type="checkbox" name="bcpt-post-type-supports-title" value="support_title"> <span class="bcpt-checkbox-span"><?php echo __('Title', 'bcpt'); ?></span><br>
			<input type="checkbox" name="bcpt-post-type-supports-editor" value="support_editor"> <span class="bcpt-checkbox-span"><?php echo __('Editor', 'bcpt'); ?></span><br>
			<input type="checkbox" name="bcpt-post-type-supports-author" value="support_author"> <span class="bcpt-checkbox-span"><?php echo __('Author', 'bcpt'); ?></span><br>
			<input type="checkbox" name="bcpt-post-type-supports-thumbnail" value="support_thumbnail"> <span class="bcpt-checkbox-span"><?php echo __('Thumbnail', 'bcpt'); ?></span><br>
			<input type="checkbox" name="bcpt-post-type-supports-excerpt" value="support_excerpt"> <span class="bcpt-checkbox-span"><?php echo __('Excerpt', 'bcpt'); ?></span><br>
			<input type="checkbox" name="bcpt-post-type-supports-comments" value="support_comments"> <span class="bcpt-checkbox-span"><?php echo __('Comments', 'bcpt'); ?></span><br>
			<input type="checkbox" name="bcpt-post-type-supports-custom-fields" value="support_custom_fields"> <span class="bcpt-checkbox-span"><?php echo __('Custom fields', 'bcpt'); ?></span><br>

		</div>

		<div class="bcpt-form-row">

			<input class="button button-primary button-large" type="submit" name="bcpt-add-form-submit" value="<?php echo __('Add', 'bcpt'); ?>">

		</div>

	</div>

</form>
