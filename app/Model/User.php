<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel
{

  public $displayField = 'name';
  
  public $captcha = '';

  public $validate = array(
    'name' => array(
      'notempty' => array(
        'rule' => array(
          'notempty'
        ), 
        'message' => 'Please give your name'
      )
    ), 
    'email' => array(
      'email' => array(
        'rule' => array(
          'email'
        ), 
        'message' => 'Please give a valid email'
      ), 
      'unique' => array(
        'rule' => array(
          'isUnique'
        ), 
        'message' => 'Email aleready exists'
      )
    ), 
    'passwd' => array(
      'notempty' => array(
        'rule' => array(
          'notempty'
        ), 
        'message' => 'Please give the password', 
        'last' => true
      ), 
      'compare' => array(
        'rule' => 'checkPasswords', 
        'message' => 'Passwords do not match'
      )
    ),
    'captcha'=>array(
        'rule' => array('matchCaptcha')
    )
  );

  function beforeSave()
  {
    $temp = $this->data['User']['passwd'];
    $this->data['User']['passwd'] = AuthComponent::password($temp);
    return true;
  }

  function checkPasswords()
  {
    if (strcmp($this->data['User']['passwd'], 
               $this->data['User']['cpasswd']) == 0)
    {
      return true;
    }
    return false;
  }
  
  function matchCaptcha($inputValue)
  {
    return $inputValue['captcha'] == $this->getCaptcha();
  }
  
  function setCaptcha($value)
  {
    $this->captcha = $value;
  }
  
  function getCaptcha()
  {
    return $this->captcha;
  }
  
}
?>