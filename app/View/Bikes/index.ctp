<div class="bikes index">
	<h2><?php echo __('Bikes'); ?></h2>
        <?php echo $this->Session->read('Auth.User.id') ;
        echo "goo";?>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('mileage'); ?></th>
			<th><?php echo $this->Paginator->sort('no_of_gears'); ?></th>
			<th><?php echo $this->Paginator->sort('fuel_capacity'); ?></th>
			<th><?php echo $this->Paginator->sort('kerb_weight'); ?></th>
			<th><?php echo $this->Paginator->sort('self_start'); ?></th>
			<th><?php echo $this->Paginator->sort('Other'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($bikes as $bike): ?>
	<tr>
		<td><?php echo h($bike['Bike']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bike['Category']['name'], array('controller' => 'categories', 'action' => 'view', $bike['Category']['id'])); ?>
		</td>
		<td><?php echo h($bike['Bike']['name']); ?>&nbsp;</td>
		<td><?php echo h($bike['Bike']['mileage']); ?>&nbsp;</td>
		<td><?php echo h($bike['Bike']['no_of_gears']); ?>&nbsp;</td>
		<td><?php echo h($bike['Bike']['fuel_capacity']); ?>&nbsp;</td>
		<td><?php echo h($bike['Bike']['kerb_weight']); ?>&nbsp;</td>
		<td><?php echo h($bike['Bike']['self_start']); ?>&nbsp;</td>
		<td><?php echo h($bike['Bike']['Other']); ?>&nbsp;</td>
		<td><?php echo h($bike['Bike']['date']); ?>&nbsp;</td>
		<td><?php echo $this->Html->image($bike['Bike']['image'], array('width'=>'200px', 'height'=>'200px')); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bike['Bike']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bike['Bike']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bike['Bike']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $bike['Bike']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Bike'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Booked Bikes'), array('controller' => 'booked_bikes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Booked Bike'), array('controller' => 'booked_bikes', 'action' => 'add')); ?> </li>
	</ul>
</div>
