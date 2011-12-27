<?php
App::uses('AppController', 'Controller');

class CommentsController extends AppController
{
  
  public $components = array(
      'RequestHandler'
  );
  
  // Add the comment and return the json response
  public function addComment()
  {
    $error = '';
    $msg = '';
    $comment = '';
    
    $userId = $this->Auth->User('id');
    $this->autoRender = false;
    
    if (!empty($userId))
    {
      if ($this->request->is('post'))
      {
        $this->Comment->create();
        $data = $this->request->data;
        $data['Comment']['user_id'] = $userId;
        if ($this->Comment->save($data))
        {
          $comment = $this->Comment->read(array(
            'Comment.description', 
            'Comment.created', 
            'User.name'
          ), $this->Comment->id);
          
          $msg = __('The Comment has been saved');
        }
        else
        {
          $msg = __('The Comment could not be saved. Please, try again.');
        }
      }
    }
    else
    {
      $error = __('Please login');
    }
    
    $data = array(
      'error' => $error, 
      'msg' => $msg, 
      'data' => $comment
    );
    
    echo json_encode($data);
    exit();
  }
}
?>