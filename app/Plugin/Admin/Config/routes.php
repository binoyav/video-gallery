<?php
Router::connect('/admin', array(
														'controller' => 'videos', 
														'action' => 'index', 
														'plugin' => 'admin'
													)
								);
?>