<div class="bikes form">
<?php echo $this->Form->create('Bike'); ?>
	<fieldset>
		<legend><?php echo __('Edit Bike'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('name');
		echo $this->Form->input('mileage');
		echo $this->Form->input('no_of_gears');
		echo $this->Form->input('fuel_capacity');
		echo $this->Form->input('kerb_weight');
		echo $this->Form->input('self_start');
		echo $this->Form->input('Other');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Update')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Bike.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Bike.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bikes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Booked Bikes'), array('controller' => 'booked_bikes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Booked Bike'), array('controller' => 'booked_bikes', 'action' => 'add')); ?> </li>
	</ul>
</div>
