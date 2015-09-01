<div class="bookedBikes view">
<h2><?php echo __('Booked Bike'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bookedBike['BookedBike']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bike'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bookedBike['Bike']['name'], array('controller' => 'bikes', 'action' => 'view', $bookedBike['Bike']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Booked Date'); ?></dt>
		<dd>
			<?php echo h($bookedBike['BookedBike']['booked_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($bookedBike['BookedBike']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($bookedBike['BookedBike']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone Number'); ?></dt>
		<dd>
			<?php echo h($bookedBike['BookedBike']['phone_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($bookedBike['BookedBike']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
			<?php echo h($bookedBike['BookedBike']['age']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Booked Bike'), array('action' => 'edit', $bookedBike['BookedBike']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Booked Bike'), array('action' => 'delete', $bookedBike['BookedBike']['id']), array(), __('Are you sure you want to delete # %s?', $bookedBike['BookedBike']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Booked Bikes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Booked Bike'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bikes'), array('controller' => 'bikes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bike'), array('controller' => 'bikes', 'action' => 'add')); ?> </li>
	</ul>
</div>
