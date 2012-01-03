<div class="genres form">
<?php echo $this->Form->create('Genre');?>
	<fieldset>
		<legend><?php echo __('Add Genre'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('List Genres'), array('action' => 'index'));?></li>
  </ul>
</div>