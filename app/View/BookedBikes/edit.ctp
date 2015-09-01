<div class="bookedBikes form">
<?php echo $this->Form->create('BookedBike'); ?>
	<fieldset>
		<legend><?php echo __('Edit Booked Bike'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('bike_id');
		echo $this->Form->input('booked_date');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('phone_number');
		echo $this->Form->input('email');
		echo $this->Form->input('age');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BookedBike.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('BookedBike.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Booked Bikes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Bikes'), array('controller' => 'bikes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bike'), array('controller' => 'bikes', 'action' => 'add')); ?> </li>
	</ul>
</div>
