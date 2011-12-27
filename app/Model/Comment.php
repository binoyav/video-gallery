<?php
App::uses('AppModel', 'Model');

class Comment extends AppModel
{

  public $belongsTo = array(
    'User' => array(
      'className' => 'User', 
      'foreignKey' => 'user_id', 
      'conditions' => '', 
      'fields' => '', 
      'order' => ''
    )
  );
}
?>