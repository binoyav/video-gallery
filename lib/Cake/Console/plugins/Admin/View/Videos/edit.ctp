<div class="videos form">
<?php echo $this->Form->create('Video', array('type' => 'file'));?>
	<fieldset>
		<legend><?php echo __('Edit Video'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Video.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Video.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Videos'), array('action' => 'index'));?></li>
	</ul>
</div>
