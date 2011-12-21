<div class="videos index">
	<h2><?php echo __('Videos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('language_id');?></th>
			<th><?php echo $this->Paginator->sort('genre_id');?></th>
			<th><?php echo $this->Paginator->sort('thumbnail');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($videos as $video): ?>
	<tr>
		<td><?php echo h($video['Video']['title']); ?>&nbsp;</td>
		<td><?php echo h($video['Language']['name']); ?>&nbsp;</td>
		<td><?php echo h($video['Genre']['name']); ?>&nbsp;</td>
		<td><?php 
           echo $this->Html->image('../files/' . $video['Video']['thumbnail'], 
                                                            array
                                                            (
                                                              'width' => 100, 
                                                              'height' => 100
                                                            )
                                      ); 
         ?>&nbsp;
    </td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array(
                                                'action' => 'edit', 
                                                $video['Video']['id']
                                               )
                                  ); 
      ?>
			<?php echo $this->Form->postLink(__('Delete'), array(
                                                      'action' => 'delete', 
                                                      $video['Video']['id']
                                                     ), 
                                                     null, 
            __('Are you sure you want to delete # %s?', $video['Video']['id'])); 
      ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination'); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li>
		  <?php 
        echo $this->Html->link(__('New Video'), array('action' => 'add')); 
		  ?>
		</li>
	</ul>
</div>