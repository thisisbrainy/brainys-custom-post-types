<table class="wp-list-table widefat fixed striped bcpt-table" style="margin-top:15px;">

	<thead>

		<tr>

			<th scope="col" class="manage-column">
				<span><?php echo __('Label', 'bcpt'); ?></span>
			</th>

			<th scope="col" class="manage-column">
				<span><?php echo __('Description', 'bcpt'); ?></span>
			</th>

			<th scope="col" class="manage-column">
				<span><?php echo __('Name', 'bcpt'); ?></span>
			</th>

			<th scope="col" class="manage-column">
				<span><?php echo __('Rewrite', 'bcpt'); ?></span>
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

					<?php if(stristr($post_type->name, 'bcpt_')): ?>

						<div class="row-actions" style="left:0;">

 							<a href="?page=bcpt&amp;action=delete&amp;post_type_name=<?php echo $post_type->name; ?>"><?php echo __('Delete', 'bcpt'); ?></a>

						</div>

					<?php else: ?>

						<div class="row-actions" style="left:0;color:#888;">

						<?php echo __('This post type is restricted. You can\'t delete it.', 'bcpt'); ?>

						</div>

					<?php endif; ?>

				</td>

				<td><?php if(!empty($post_type->description)): echo $post_type->description; else: echo __('No description set.', 'bcpt'); endif; ?></td>

				<td><code><?php echo $post_type->name; ?></code></td>
				<td><?php if($post_type->rewrite): echo '<code>/' . $post_type->rewrite['slug'] . '</code>'; else: echo __('No rewrite was set.', 'bcpt'); endif; ?></td>

			</tr>

		<?php endforeach; ?>

	</tbody>

</table>
