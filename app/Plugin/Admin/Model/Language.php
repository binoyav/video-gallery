<?php
App::uses('AppModel', 'Model');

class Language extends AppModel
{
	public $displayField = 'name';

  public $validate = array(
		'name' => array(
  		'notempty' => array(
	     	'rule' => array('notempty'),
		  )
		)
	);
}
?>