<h1>Admin Panel</h1>
<ul>
  <li><?php echo $this->Html->link(__('Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
  <li><?php echo $this->Html->link(__('Genres'), array('controller' => 'genres', 'action' => 'index')); ?> </li>
  <li><?php echo $this->Html->link(__('Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
</ul>