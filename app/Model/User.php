<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel
{

  public $displayField = 'name';
  
  public $captcha = '';

  /* public $belongsTo = array(
    'Group'
  );
  
  public $actsAs = array(
    'Acl' => array(
      'type' => 'requester'
    )
  ); */
  
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
        'message' => 'Email already exists'
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
  
  // For Acl
  /* function bindNode($user)
  {
    return array(
        'model' => 'Group',
        'foreign_key' => $user['User']['group_id']
    );
  } */
  
  // For Acl
  /* function parentNode()
  {
    if (!$this->id && empty($this->data))
    {
      return null;
    }
    
    if (isset($this->data['User']['group_id'])) 
    {
      $groupId = $this->data['User']['group_id'];
    }
    else
    {
      $groupId = 3; //$this->field('group_id');
    }
    
    if (!$groupId)
    {
      return null;
    }
    else
    {
      return array(
        'Group' => array(
          'id' => $groupId
        )
      );
    }
  } */

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