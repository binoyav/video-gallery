<?php
class AppController extends Controller
{

  public $components = array(
    'Session', 
    'Auth' => array(
      'loginAction' => array(
        'controller' => 'users', 
        'action' => 'login', 
        'admin' => false, 
        'plugin' => false
      ),
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
      ),
      'authorize' => array(
        'Actions' => array(
          'actionPath' => 'controllers',
           'userModel' => 'User',
        ),
      ),
    ),
    'Acl'
  );
  
  function beforeFilter()
  {
    if ($this->Session->check('language'))
    {
      if (Configure::read('Config.language') != $this->Session->read('language'))
      {
        Configure::write('Config.language', $this->Session->read('language'));
      }
    }
  }
  /* 
  function isAuthorized($user) {
    // return false;
    return $this->Auth->loggedIn();
  } */

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