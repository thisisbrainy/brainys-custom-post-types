<table class="wp-list-table widefat fixed striped acpt-table" style="margin-top:15px;">

	<thead>

		<tr>

			<th scope="col" class="manage-column">
				<span><?php echo __('Label', 'acpt'); ?></span>
			</th>

			<th scope="col" class="manage-column">
				<span><?php echo __('Description', 'acpt'); ?></span>
			</th>

			<th scope="col" class="manage-column">
				<span><?php echo __('Name', 'acpt'); ?></span>
			</th>

			<th scope="col" class="manage-column">
				<span><?php echo __('Rewrite', 'acpt'); ?></span>
			</th>

		</tr>

	</thead>

	<tbody id="the-list">

		<?php foreach(get_post_types([], 'objects') as $post_type): ?>

			<tr>

				<td class="title column-title has-row-actions column-primary page-title">
					<?php
					#var_dump($post_type);
					?>
					<strong><?php echo $post_type->labels->name; ?></strong>

					<?php if(stristr($post_type->name, 'acpt_')): ?>

						<div class="row-actions" style="left:0;">

 							<a href="?page=acpt&amp;action=delete&amp;post_type_name=<?php echo $post_type->name; ?>"><?php echo __('Delete', 'acpt'); ?></a>

						</div>

					<?php else: ?>

						<div class="row-actions" style="left:0;color:#888;">

						<?php echo __('This post type is restricted. You can\'t delete it.', 'acpt'); ?>

						</div>

					<?php endif; ?>

				</td>

				<td><?php if(!empty($post_type->description)): echo $post_type->description; else: echo __('No description set.', 'acpt'); endif; ?></td>

				<td><code><?php echo $post_type->name; ?></code></td>
				<td><?php if($post_type->rewrite): echo '<code>/' . $post_type->rewrite['slug'] . '</code>'; else: echo __('No rewrite was set.', 'acpt'); endif; ?></td>

			</tr>

		<?php endforeach; ?>

	</tbody>

</table>
