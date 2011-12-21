<!DOCTYPE  html>
<html>
  <head>
  <meta charset="utf-8">
  <title><?php echo $title_for_layout?></title>
    <base href="http://localhost/video-gallery/" />
		<?php echo $this->Html->css('style'); ?>
		<?php echo $this->Html->script('jquery.min'); ?>
		
	</head>
	<body>
		<div id="headerimgs">
			<div id="headerimg1" class="headerimg"></div>
			<div id="headerimg2" class="headerimg"></div>
		</div>
		<div id="headernav">
			<div id="back" class="btn"></div>
			<div id="next" class="btn"></div>
		</div>
		<div id="top-gap"></div>
		<div class="wrapper">
      <?php echo $this->Html->image('logo.png', array(
                                        'alt' => '', 
                                        'url' => array(
                                              'controller' => 'videos'
                                            ), 
                                        'id' => 'logo'
                                      )
                                    ) 
      ?>
			<div id="nav-bar-holder">
				<ul id="nav" class="sf-menu">
					<li  class="current-menu-item"><a href="#">Home</a></li>
					<?php 
					if (!$this->Session->read('User.id')):
          ?>
					   <li><?php echo $this->Html->link(__('Login'), array(
                                               'controller' => 'users',
                                               'action' => 'login'
                                               )
                                          );
             ?></li>
					   <li><?php echo $this->Html->link(__('Register'), array(
					                                     'controller' => 'users',
					                                     'action' => 'registration'
					                                     )
					                                );
              ?>
              </li>
          <?php
          else:
          ?>
            <li><?php echo $this->Html->link(__('Logout'), array(
                                               'controller' => 'users',
                                               'action' => 'logout'
                                               )
                                          );
             ?>
          <?php     
          endif; ?>
					<li><a href="#">Contact</a></li>
				</ul>
			</div>
	        <div id="content-wrap">
            <?php 
    echo $this->Session->flash(); 
                  echo $content_for_layout; ?>
          </div>
		<!-- FOOTER -->
		<div id="footer">
			<div class="footer-wrapper">
				
				
				<!-- footer-cols -->
				<ul id="footer-cols">
					<li>
						<h6>About the Gallery</h6>
						<p>Pellentesque accumsan porttitor, accumsan porttitor ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Tincidunt quis, accumsan porttitor facilisis habitant morbi tristique senectus accumsan porttitor et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam,  Aenean ultricies mi vitae est. Tincidunt quis feugiat vitae.</p> 
					</li>
					<li>
						<h6>Categories</h6>
						<ul>
							<li><a href="#">All</a></li>
							<li><a href="#/">Action</a></li>
							<li><a href="#">Commedy</a></li>
							<li><a href="#">Cartoons</a></li>
							<li><a href="#">Drama</a></li>
						</ul>
					</li>
					<li>
						<div id="tweets" class="footer-col tweet">
	         				<h6>Twitter widget</h6>
	         			</div>
					</li>
				</ul>
				<!-- ENDS footer-cols -->
				
				<div id="footer-glare"></div>
			</div>
		</div>
<!-- ENDS FOOTER -->
		
		<!-- footer-bottom -->
		<div id="footer-bottom">
			<div class="bottom-wrapper">
				<div id="bottom-left">
					&copy; 2011 Camo Solutons. All Rights Reserved.
			  </div>
				
			</div>
		</div>
		<!-- ENDS footer-bottom -->
<?php 
//echo $this->element('sql_dump');
?>
	</body>
</html>