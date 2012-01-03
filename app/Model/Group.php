<?php
class Group extends Model
{

  public $actsAs = array(
    'Acl' => array(
      'type' => 'requester'
    )
  );

  function parentNode()
  {
    return null;
  }

}
?>