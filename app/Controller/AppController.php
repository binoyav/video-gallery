<?php
class AppController extends Controller
{

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
      )/* ,
      'authorize' => array(
        'Actions' => array(
          'actionPath' => 'controllers'
        ),
      ), */
    ),
  );
  
  function beforeFilter()
  {
    $this->Auth->loginRedirect = array(
            'controller' => 'videos',
            'action' => 'index'
        );
    
    if ($this->Session->check('language'))
    {
      if (Configure::read('Config.language') != $this->Session->read('language'))
      {
        Configure::write('Config.language', $this->Session->read('language'));
      }
    }
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