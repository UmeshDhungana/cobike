<div class="bikes form">			
<?php echo $this->Form->create('Bike', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Bike'); ?></legend>
	<?php

	 //echo $this->Form->input('category_id',array('options'=>(array('1' => 'Bajaj', '2'=> 'Hero Honda', '3'=>'Honda', '4'=>'Yamaha'))));

		echo $this->Form->input('category_id'); 
                echo $this->Form->input('user_id',array('type'=>'hidden',
                    'value'=>$this->Session->read('Auth.User.id')));
		echo $this->Form->input('name');
		echo $this->Form->input('mileage');
		echo $this->Form->input('no_of_gears');
		echo $this->Form->input('fuel_capacity');
		echo $this->Form->input('kerb_weight');
		echo $this->Form->input('self_start');
		echo $this->Form->input('Other');
	?>
	</fieldset>
	<?php if (!empty($this->data['Bike']['filepath'])): ?>
	<div class="input">
		<label>Uploaded File</label>
		<?php
		echo $this->Form->input('filepath', array('type'=>'hidden'));
		echo $this->Html->link(basename($this->data['Bike']['filepath']), $this->data['Bike']['filepath']);
		?>
	</div>
<?php else: ?>
	<?php echo $this->Form->input('image',array(
		'type' => 'file'
	)); ?>
<?php endif; ?>

<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Bikes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Booked Bikes'), array('controller' => 'booked_bikes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Booked Bike'), array('controller' => 'booked_bikes', 'action' => 'add')); ?> </li>
	</ul>
</div>
