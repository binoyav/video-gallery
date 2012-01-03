<div class="adminUsers view">
<h2><?php  echo __('Admin User');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($adminUser['AdminUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($adminUser['AdminUser']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email Address'); ?></dt>
		<dd>
			<?php echo h($adminUser['AdminUser']['email_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pass Word'); ?></dt>
		<dd>
			<?php echo h($adminUser['AdminUser']['pass_word']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created Date'); ?></dt>
		<dd>
			<?php echo h($adminUser['AdminUser']['created_date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Admin User'), array('action' => 'edit', $adminUser['AdminUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Admin User'), array('action' => 'delete', $adminUser['AdminUser']['id']), null, __('Are you sure you want to delete # %s?', $adminUser['AdminUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Admin Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Admin User'), array('action' => 'add')); ?> </li>
	</ul>
</div>
