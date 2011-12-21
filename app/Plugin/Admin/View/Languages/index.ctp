<div class="languages index">
	<h2><?php echo __('Languages');?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
		</tr>
	  <?php
	  $i = 0;
    foreach ($languages as $language): 
    ?>
	  <tr>
			<td><?php echo h($language['Language']['name']); ?>&nbsp;</td>
			<td class="actions">
			  <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $language['Language']['id'])); ?>
			</td>
		</tr>
    <?php 
    endforeach; 
    ?>
	</table>
	<?php echo $this->element('pagination'); ?>
</div>
<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('New Language'), array('action' => 'add')); ?></li>
  </ul>
</div>