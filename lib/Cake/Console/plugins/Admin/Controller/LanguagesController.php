<?php
App::uses('AppController', 'Controller');

class LanguagesController extends AppController
{

  public $layout = 'admin';

  public function index()
  {
    $this->Language->recursive = 0;
    $this->set('languages', $this->paginate());
  }

  public function add()
  {
    if ($this->request->is('post'))
    {
      $this->Language->create();
      if ($this->Language->save($this->request->data))
      {
        $this->Session->setFlash(__('The language has been saved'));
        $this->redirect(array(
          'action' => 'index'
        ));
      }
      else
      {
        $this->Session->setFlash(__('The language could not be saved. Please, 
                                                                try again.'));
      }
    }
  }

  public function edit($id = null)
  {
    $this->Language->id = $id;
    
    if (!$this->Language->exists())
    {
      throw new NotFoundException(__('Invalid language'));
    }
    
    if ($this->request->is('post') || $this->request->is('put'))
    {
      if ($this->Language->save($this->request->data))
      {
        $this->Session->setFlash(__('The language has been saved'));
        $this->redirect(array(
          'action' => 'index'
        ));
      }
      else
      {
        $this->Session->setFlash(__('The language could not be saved. Please, 
		                                                            try again.'));
      }
    }
    else
    {
      $this->request->data = $this->Language->read(null, $id);
    }
  
  }
}
?>