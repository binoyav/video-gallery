<?php echo $this->Html->css('form', true); ?>
<div class="users form">
	<?php echo $this->Form->create('User');?>
	<?php
    echo $this->Form->input('name');
    echo $this->Form->input('email');
    echo $this->Form->input('passwd', array(
                                        'type' => 'password',
                                        'label' => 'Password'
                                      )
                            );
    echo $this->Form->input('cpasswd', array(
                                        'type' => 'password',
                                        'label' => 'Confirm Password'
                                      )
                           );
  ?>
	
  <?php echo $this->Html->image($this->Html->url(array(
                                                  'controller' => 'users', 
                                                  'action'=>'captcha'
                                                ), true)
                               ); 
  ?>
  <p>Enter security code shown above:</p>
  <?php
    echo $this->Form->input('User.captcha',array(
                                             'autocomplete' => 'off', 
                                             'label' => false,
                                             'class' => '', 
                                             'error' => __('The characters you 
type must match the characters in the picture. Please try again.', true)
                                           )
                           );
  ?>
  <?php echo $this->Form->input('Submit', array(
                                          'class' => 'submit',
                                          'type' => 'submit',
                                          'label' => false
                                         )
                             );
  ?>
	</form>
</div>