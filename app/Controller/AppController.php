<?php
class AppController extends Controller
{

 /*  public $helpers = array(
    'Session'
  ); */

  public $components = array(
    'Session', 
    'Auth' => array(
      'loginRedirect' => array(
        'controller' => 'videos', 
        'action' => 'index'
      ), 
      'logoutRedirect' => array(
        'controller' => 'videos', 
        'action' => 'index'
      ), 
      'authenticate' => array(
        'Form' => array(
          'fields' => array(
            'username' => 'email', 
            'password' => 'passwd'
          )
        )
      )
    )
  );
  
  function beforeFilter()
  {
    $this->Auth->loginRedirect = array(
            'controller' => 'videos',
            'action' => 'index'
        );
  }

  function checkLogin()
  {
    $userId = $this->Session->read('User.id');
    
    if (!empty($userId))
    {
      return true;
    }
    else
    {
      return false;
    }
  }

}
?>