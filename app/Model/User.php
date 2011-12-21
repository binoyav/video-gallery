<?php
App::uses('AppModel', 'Model');

class User extends AppModel
{

	public $displayField = 'name';

  public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please give your name',
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Please give a valid email',
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'Email aleready exists',
			) 
		),
		'passwd' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please give the password',
				'last' => true
			),
			'compare' =>array(
				'rule' =>'checkPasswords',
				'message' => 'Passwords do not match'
			)
		)
	);
	
	function beforeSave()
	{
		$temp = $this->data['User']['passwd'];
		$this->data['User']['passwd'] = md5($temp);
		return true;
	}
	
	function checkPasswords()
	{
		if (strcmp($this->data['User']['passwd'], $this->data['User']['cpasswd']) == 0)
		{
			return true;
		}
		return false;
	}
	
	function getUserDetails($data)
	{
		if (!empty($data['User']['email']) && !empty($data['User']['passwd']))
		{
			$conditions = array(
											'User.email' =>  $data['User']['email'],
											'User.passwd' =>  md5($data['User']['passwd'])
										);
			
			$result = $this->find('first', array('conditions' => $conditions));
			
			if (!empty($result))
			{
				return $result;
			}
		}
		return false;
	}
}
?>