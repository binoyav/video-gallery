<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController
{

  var $components = array(
    'Captcha'
  );

  public function beforeFilter()
  {
    parent::beforeFilter();
    $this->Auth->allow('registration', 'captcha');
  }

  public function login()
  {
    if ($this->request->is('post'))
    {
      if ($this->Auth->login())
      {
        $this->redirect($this->Auth->redirect());
      }
      else
      {
        $this->Session->setFlash(__('Invalid username or password, try again'));
      }
    }
  }

  public function captcha()
  {
    $this->autoRender = false;
    $this->layout = 'ajax';
    $this->Captcha->create();
  }
  
  // For registration
  public function registration()
  {
    if (!$this->checkLogin())
    {
      if ($this->request->is('post'))
      {
        $this->User->create();
        $this->User->setCaptcha($this->Captcha->getVerCode());
        
        if ($this->User->save($this->request->data))
        {
          $this->Session->setFlash(__('Successfully registered'));
          $this->redirect(array(
            'controller' => 'videos', 
            'action' => 'index'
          ));
        }
        else
        {
          $this->Session->setFlash(__('We encountered errors in the information 
              you submitted. Please check the fields marked below and try again.'
              )
            );
        }
      }
    }
    else
    {
      $this->redirect('/videos/index');
    }
  }

  function logout()
  {
    $this->redirect($this->Auth->logout());
  }
}
?>