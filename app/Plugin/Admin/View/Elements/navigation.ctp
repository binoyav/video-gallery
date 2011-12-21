<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('List Genres'), array(
                                                            'action' => 'index'
                                                        )
                                    );
        ?>
    </li>
    <li><?php echo $this->Html->link(__('List Videos'), array(
                                                     'controller' => 'videos', 
                                                     'action' => 'index'
                                                    )
                                    ); 
        ?>
    </li>
    <li><?php echo $this->Html->link(__('New Video'), array(
                                                        'controller' => 'videos', 
                                                        'action' => 'add'
                                                       )
                                    ); 
        ?>
    </li>
  </ul>
</div>