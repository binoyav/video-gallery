<div class="adminUsers index">
	<h2><?php echo __('Admin Users');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('email_address');?></th>
			<th><?php echo $this->Paginator->sort('pass_word');?></th>
			<th><?php echo $this->Paginator->sort('created_date');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($adminUsers as $adminUser): ?>
	<tr>
		<td><?php echo h($adminUser['AdminUser']['id']); ?>&nbsp;</td>
		<td><?php echo h($adminUser['AdminUser']['name']); ?>&nbsp;</td>
		<td><?php echo h($adminUser['AdminUser']['email_address']); ?>&nbsp;</td>
		<td><?php echo h($adminUser['AdminUser']['pass_word']); ?>&nbsp;</td>
		<td><?php echo h($adminUser['AdminUser']['created_date']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $adminUser['AdminUser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $adminUser['AdminUser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $adminUser['AdminUser']['id']), null, __('Are you sure you want to delete # %s?', $adminUser['AdminUser']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
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
		<li><?php echo $this->Html->link(__('New Admin User'), array('action' => 'add')); ?></li>
	</ul>
</div>
