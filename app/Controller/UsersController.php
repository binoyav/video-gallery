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
    $this->Auth->allow('login', 'registration', 'captcha', 'changeLanguage', 'logout');
   // $this->Auth->allow('*');
  }
  
  public function login()
  {
    if ($this->Session->read('Auth.User')) {
      $this->Session->setFlash('You are logged in!');
      $this->redirect('/', null, false);
    }
    
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
          $this->Session->setFlash(__('Successfully registered'), 'default', 
                                    array(
                                      'class' => 'success'
                                    )
                                  );
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
  
  function changeLanguage($language)
  {
    $this->Session->write('language', $language);
    $this->redirect($this->referer());
  }
}
?>