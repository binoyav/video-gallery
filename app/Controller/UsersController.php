<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController
{
	
	public $layout = 'default';
	
	// Check the login
	public function login()
	{
		if ($this->request->is('post'))
		{
			if ($result = $this->User->getUserDetails($this->request->data))
			{
				$this->Session->write('User', $result['User']);
				
				return $this->redirect(array(
																	'controller' => 'videos',
																	'action' => 'index'
																)
															);
			}
			else
			{
				$this->Session->setFlash(__('Email or password is incorrect'));
			}
		}
	}

	// For registration
	public function registration()
	{
		if ($this->request->is('post'))
		{
			$this->User->create();
			if ($this->User->save($this->request->data))
			{
				$this->Session->setFlash(__('Successfully registered'));
				$this->redirect(array(
														'controller' => 'videos', 
														'action' => 'index'
													)
												);
			}
			else 
			{
				$this->Session->setFlash(__('Could not able to register. Please, try again.'));
			}
		}
	}
	
	function checkLogin()
	{
		return parent::checkLogin();
	}
	
	function logout()
	{
		$this->Session->delete('User');
		$this->redirect(array(
														'controller' => 'videos', 
														'action' => 'index'
													)
												);
	}
}
?>