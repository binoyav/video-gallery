<?php
App::uses('AdminAppController', 'Admin.Controller');

class VideosController extends AdminAppController
{

  public function index()
  {
    $this->Video->recursive = 0;
    $this->set('videos', $this->paginate());
  }

  public function add()
  {
    
    if ($this->request->is('post'))
    {
      
      if ($this->_uploadFile($this->request->data['Video']['thumbnail']))
      {
        $this->request->data['Video']['thumbnail'] = $this->request->data['Video']['thumbnail']['name'];
      }
      else
      {
        unset($this->request->data['Video']['thumbnail']);
      }
      
      if ($this->_uploadFile($this->request->data['Video']['video_file']))
      {
        $this->request->data['Video']['video_file'] = $this->request->data['Video']['video_file']['name'];
      }
      else
      {
        unset($this->request->data['Video']['video_file']);
      }
      
      $this->Video->create();
      
      if ($this->Video->save($this->request->data))
      {
        $this->Session->setFlash(__('The video has been saved'));
        $this->redirect(array(
          'action' => 'index'
        ));
      }
      else
      {
        $this->Session->setFlash(__('The video could not be saved. Please, 
                                                                  try again.'));
      }
    
    }
    
    $languages = $this->Video->Language->find('list');
    $genres = $this->Video->Genre->find('list');
    $this->set(compact('languages', 'genres'));
  }

  public function edit($id = null)
  {
    $this->Video->id = $id;
    
    if (!$this->Video->exists())
    {
      throw new NotFoundException(__('Invalid video'));
    }
    
    if ($this->request->is('post') || $this->request->is('put'))
    {
      
      if ($this->_uploadFile($this->request->data['Video']['thumbnail']))
      {
        $this->request->data['Video']['thumbnail'] = $this->request->data['Video']['thumbnail']['name'];
      }
      else
      {
        unset($this->request->data['Video']['thumbnail']);
      }
      
      if ($this->_uploadFile($this->request->data['Video']['video_file']))
      {
        $this->request->data['Video']['video_file'] = $this->request->data['Video']['video_file']['name'];
      }
      else
      {
        unset($this->request->data['Video']['video_file']);
      }
      
      if ($this->Video->save($this->request->data))
      {
        $this->Session->setFlash(__('The video has been saved'));
        $this->redirect(array(
          'action' => 'index'
        ));
      }
      else
      {
        $this->Session->setFlash(__('The video could not be saved. Please, 
                                                                  try again.'));
      }
    
    }
    else
    {
      $this->request->data = $this->Video->read(null, $id);
    }
    
    $languages = $this->Video->Language->find('list');
    $genres = $this->Video->Genre->find('list');
    $this->set(compact('languages', 'genres'));
  }

  public function delete($id = null)
  {
    
    if (!$this->request->is('post'))
    {
      throw new MethodNotAllowedException();
    }
    
    $this->Video->id = $id;
    
    if (!$this->Video->exists())
    {
      throw new NotFoundException(__('Invalid video'));
    }
    
    if ($this->Video->delete())
    {
      $this->Session->setFlash(__('Video deleted'));
      $this->redirect(array(
        'action' => 'index'
      ));
    }
    
    $this->Session->setFlash(__('Video was not deleted'));
    $this->redirect(array(
      'action' => 'index'
    ));
  }

  function _uploadFile($file)
  {
    
    if (!empty($file))
    {
      if (move_uploaded_file($file['tmp_name'], WWW_ROOT . DS . 'files' . DS .
           $file['name']))
      {
        return true;
      }
    }
    return false;
  }
}
?>