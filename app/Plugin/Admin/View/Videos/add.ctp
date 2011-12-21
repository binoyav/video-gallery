<div class="videos form">
<?php echo $this->Form->create('Video', array('type' => 'file'));?>
	<fieldset>
		<legend><?php echo __('Add Video'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('language_id');
		echo $this->Form->input('genre_id');
		echo $this->Form->input('thumbnail', array('type' => 'file'));
		echo $this->Form->input('video_file', array('type' => 'file'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
    <li><?php echo $this->Html->link(__('List Videos'), array('action' => 'index'));?></li>
	</ul>
</div>
