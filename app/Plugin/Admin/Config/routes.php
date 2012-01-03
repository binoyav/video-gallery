<?php
Router::connect('/admin', array(
  'controller' => 'videos', 
  'action' => 'index', 
  'plugin' => 'Admin'
));

Router::connect('/Admin', array(
  'controller' => 'videos', 
  'action' => 'index', 
  'plugin' => 'Admin'
));
?>