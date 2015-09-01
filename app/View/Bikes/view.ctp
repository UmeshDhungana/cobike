<div class="bikes view">
<h2><?php echo __('Bike'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bike['Bike']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bike['Category']['name'], array('controller' => 'categories', 'action' => 'view', $bike['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($bike['Bike']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mileage'); ?></dt>
		<dd>
			<?php echo h($bike['Bike']['mileage']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No Of Gears'); ?></dt>
		<dd>
			<?php echo h($bike['Bike']['no_of_gears']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fuel Capacity'); ?></dt>
		<dd>
			<?php echo h($bike['Bike']['fuel_capacity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kerb Weight'); ?></dt>
		<dd>
			<?php echo h($bike['Bike']['kerb_weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Self Start'); ?></dt>
		<dd>
			<?php echo h($bike['Bike']['self_start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Other'); ?></dt>
		<dd>
			<?php echo h($bike['Bike']['Other']); ?>
			&nbsp;
		</dd>
		<dd>
			<?php echo $this->Html->image($bike['Bike']['image'],array('width'=>'200px','height'=>'180px')) ; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bike'), array('action' => 'edit', $bike['Bike']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bike'), array('action' => 'delete', $bike['Bike']['id']), array(), __('Are you sure you want to delete # %s?', $bike['Bike']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bikes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bike'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Booked Bikes'), array('controller' => 'booked_bikes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Booked Bike'), array('controller' => 'booked_bikes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Booked Bikes'); ?></h3>
	<?php if (!empty($bike['BookedBike'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Bike Id'); ?></th>
		<th><?php echo __('Booked Date'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bike['BookedBike'] as $bookedBike): ?>
		<tr>
			<td><?php echo $bookedBike['id']; ?></td>
			<td><?php echo $bookedBike['user_id']; ?></td>
			<td><?php echo $bookedBike['bike_id']; ?></td>
			<td><?php echo $bookedBike['booked_date']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'booked_bikes', 'action' => 'view', $bookedBike['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'booked_bikes', 'action' => 'edit', $bookedBike['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'booked_bikes', 'action' => 'delete', $bookedBike['id']), array(), __('Are you sure you want to delete # %s?', $bookedBike['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Booked Bike'), array('controller' => 'booked_bikes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
