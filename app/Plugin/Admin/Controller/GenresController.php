<?php
App::uses('AdminAppController', 'Admin.Controller');

class GenresController extends AdminAppController
{

  public function index()
  {
    $this->Genre->recursive = 0;
    $this->set('genres', $this->paginate());
  }
  
  public function add()
  {
  	
    if ($this->request->is('post')) 
    {
      $this->Genre->create();
      
      if ($this->Genre->save($this->request->data)) 
      {
        $this->Session->setFlash(__('The genre has been saved'));
        $this->redirect(array('action' => 'index'));
      } 
      else 
      {
        $this->Session->setFlash(__('The genre could not be saved. Please, 
                                                                  try again.'));
      }
    }
    
	}
  
  public function edit($id = null)
  {
		$this->Genre->id = $id;
		
		if (!$this->Genre->exists()) 
		{
		  throw new NotFoundException(__('Invalid genre'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) 
		{
		  if ($this->Genre->save($this->request->data)) 
		  {
		    $this->Session->setFlash(__('The genre has been saved'));
		    $this->redirect(array('action' => 'index'));
		  } 
		  else 
		  {
		     $this->Session->setFlash(__('The genre could not be saved. Please, 
		                                                              try again.'));
		  }
		}
		else 
		{
		  $this->request->data = $this->Genre->read(null, $id);
		}
		
	}
}
?>