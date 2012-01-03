<h1>Admin Panel</h1>
<ul>
	<li>
		<?php echo $this->Html->link(__('Videos'), array(
                                                 'controller' => 'videos', 
                                                 'action' => 'index',
                                                 'plugin' => 'admin',
                                                 'admin' => false
                                               )
                                ); 
    ?>
	</li>
	<li>
		<?php echo $this->Html->link(__('Genres'), array(
                                                 'controller' => 'genres', 
                                                 'action' => 'index',
                                                 'plugin' => 'admin',
                                                 'admin' => false
                                               )
                                ); 
    ?>
	</li>
	<li>
		<?php echo $this->Html->link(__('Languages'), array(
                                                    'controller' => 'languages', 
                                                    'action' => 'index',
                                                    'plugin' => 'admin',
                                                    'admin' => false
                                                  )
                                ); 
    ?>
	</li>
	<li>
    <?php echo $this->Html->link(__('Assign Permissions'), array(
                                                    'controller' => 'aros', 
                                                    'action' => 'index',
                                                    'plugin' => 'acl',
                                                    'admin' => true
                                                  )
                                ); 
    ?>
  </li>
	<?php if (AuthComponent::user('id')): ?>
	<li>
		<?php echo $this->Html->link(__('Logout'), array(
                                               'controller' => 'users',
                                               'action' => 'logout',
                                               'admin' => false,
                                               'plugin' => false
                                               )
                                          );
   ?>
	</li>
  <?php endif; ?>
</ul>