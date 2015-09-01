<div class="categories view">
<h2><?php echo __('Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($category['Category']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($category['Category']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), array(), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bikes'), array('controller' => 'bikes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bike'), array('controller' => 'bikes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Bikes'); ?></h3>
	<?php if (!empty($category['Bike'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Mileage'); ?></th>
		<th><?php echo __('No Of Gears'); ?></th>
		<th><?php echo __('Fuel Capacity'); ?></th>
		<th><?php echo __('Kerb Weight'); ?></th>
		<th><?php echo __('Self Start'); ?></th>
		<th><?php echo __('Other'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($category['Bike'] as $bike): ?>
		<tr>
			<td><?php echo $bike['id']; ?></td>
			<td><?php echo $bike['category_id']; ?></td>
			<td><?php echo $bike['user_id']; ?></td>
			<td><?php echo $bike['name']; ?></td>
			<td><?php echo $bike['mileage']; ?></td>
			<td><?php echo $bike['no_of_gears']; ?></td>
			<td><?php echo $bike['fuel_capacity']; ?></td>
			<td><?php echo $bike['kerb_weight']; ?></td>
			<td><?php echo $bike['self_start']; ?></td>
			<td><?php echo $bike['Other']; ?></td>
			<td><?php echo $bike['date']; ?></td>
			<td><?php echo $bike['image']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bikes', 'action' => 'view', $bike['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bikes', 'action' => 'edit', $bike['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bikes', 'action' => 'delete', $bike['id']), array(), __('Are you sure you want to delete # %s?', $bike['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bike'), array('controller' => 'bikes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
