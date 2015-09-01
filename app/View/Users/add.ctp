<div class="users form">
    <h3>Register</h3>
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('first_name');
                echo $this->Form->input('last_name');
		echo $this->Form->input('username');
                echo $this->Form->input('password');
                echo $this->Form->input('password_confirmation', array('type'=>'password'));
                echo $this->Form->input('email');
                echo $this->Form->input('phone_number');		
                echo $this->Form->input('role',array('options'
                    =>array('admin'=>'Admin','vendor'=>'Vendor')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('User.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Bikes', true), array('controller' => 'bikes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bikes', true), array('controller' => 'bikes', 'action' => 'add')); ?> </li>
	</ul>
</div>