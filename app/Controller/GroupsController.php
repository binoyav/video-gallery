<?php
App::uses('AppController', 'Controller');

class GroupsController extends AppController
{

  public function beforeFilter()
  {
    parent::beforeFilter();
    $this->Auth->allow('*');
  }
}
?>