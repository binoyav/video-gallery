<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title><?php echo $title_for_layout?></title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <?php echo $this->Html->css('admin'); ?>
  <?php echo $scripts_for_layout ?>
  </head>
<body>
  <div id="header">
    <?php echo $this->element('header', array(), array(
                                                   'plugin' => 'admin'
                                                 )
                             ); 
    ?>
  </div>
  <div id="content">
    <?php
      echo $this->Session->flash('auth');
      echo $this->Session->flash(); 
      echo $content_for_layout; 
    ?>
  </div>
  <div id="footer">
    <?php echo $this->element('footer', array(), array(
                                                   'plugin' => 'admin'
                                                 )
                             ); 
    ?>
  </div>
</body>
</html>