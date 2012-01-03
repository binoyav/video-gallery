<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class VideosController extends AppController
{

  public $components = array(
    'RequestHandler'
  );

  public $helpers = array(
    'Js'
  );
  
  function beforeFilter()
  {
    parent::beforeFilter();
    $this->Auth->allow('index', 'getVideoDetails', 'getVideoList');
  }
  
  public function index()
  {
    $this->layout = 'default';
    $this->set('genres', $this->Video->Genre->find('list'));
    $this->set('languages', $this->Video->Language->find('list'));
  
    $this->setConditon();
    $this->setVideos();
  }
  
  // For filter condition
  private function setConditon()
  {
    if (isset($this->request->named['genre']))
    {
      $genreId = $this->request->named['genre'];
      $this->Session->write('genreId', $genreId);
    }
    else
    {
      $genreId = $this->Session->read('genreId');
    }
  
    if (isset($this->request->named['language']))
    {
      $langId = $this->request->named['language'];
      $this->Session->write('langId', $langId);
    }
    else
    {
      $langId = $this->Session->read('langId');
    }
  
    $conditions = '';
    $search = '';
    // debug($this->request);
    $search = isset($this->request->named['q']) ? $this->request->named['q'] :
               (isset($this->request->query['q']) ? $this->request->query['q'] : '');
    
    if (!empty($search))
    {
      $conditions[] = "Video.title LIKE '%" . Sanitize::clean($search) . "%'";
      $langId = '';
      $genreId = '';
    }
    else
    {
      if (!empty($genreId) && is_numeric($genreId))
      {
        $conditions[] = 'Video.genre_id = ' . $genreId;
      }
  
      if (!empty($langId) && is_numeric($langId))
      {
        $conditions[] = 'Video.language_id = ' . $langId;
      }
    }
  
    if (!empty($conditions))
    {
      $conditions = implode(' AND ', $conditions);
    }
    $this->paginate = array(
      'conditions' => array(
        $conditions
      ),
      'limit' => DEFAULT_PAGE_LIMIT,
      'paramType' => 'querystring'
    );
    $this->set('selLangId', $langId);
    $this->set('selGenreId', $genreId);
    $this->set('search', $search);
  }
  
  // Set the videos for view
  private function setVideos()
  {
    $this->Video->recursive = 0;
    $videos = $this->paginate();
    $videoId = '';
    // Show the first video as selected video
    $selectedVideo = array();
    $selectedVideoComments = array();
  
    if (count($videos) > 0)
    {
      $selectedVideo = $videos[0];
      $videoId = $videos[0]['Video']['id'];
      $selectedVideoComments = $this->Video->getVideoComments($videoId);
    }
  
    $this->set('selectedVideo', $selectedVideo);
    $this->set('selectedVideoComments', $selectedVideoComments);
    $this->set('videoId', $videoId);
    $this->set('videos', $videos);
  }
  
  public function getVideoList()
  {
    $this->layout = 'ajax';
    $this->autoRender = false;
    $this->setConditon();
    $this->setVideos();
    $this->render('/Elements/video_list');    
  }
  
  // Get individual video details
  public function getVideoDetails($id = null)
  {
    $this->layout = 'ajax';
    $this->Video->id = $id;
    if (!$this->Video->exists())
    {
      throw new NotFoundException(__('Invalid video'));
    }
  
    $selectedVideoComments = $this->Video->getVideoComments($id);
    $this->set('selectedVideo', $this->Video->read(null, $id));
    $this->set('selectedVideoComments', $selectedVideoComments);
    $this->set('videoId', $id);
  }
  
  
  public function admin_index()
  {
    $this->layout = 'admin';
    $this->Video->recursive = 0;
    $this->set('videos', $this->paginate());
  }
  
  public function admin_add()
  {
    $this->layout = 'admin';
    
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
            'action' => 'admin_index'
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
  
  public function admin_edit($id = null)
  {
    $this->layout = 'admin';
    
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
            'action' => 'admin_index'
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
  
  public function admin_delete($id = null)
  {
    $this->layout = 'admin';
    
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
          'action' => 'admin_index'
      ));
    }
  
    $this->Session->setFlash(__('Video was not deleted'));
    $this->redirect(array(
        'action' => 'admin_index'
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