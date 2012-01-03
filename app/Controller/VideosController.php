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
  
}
?>