<?php
App::uses('AppModel', 'Model');

class Genre extends AppModel
{

  public $displayField = 'name';

  public $validate = array(
			'name' => array(
				'notempty' => array(
				  'rule' => array('notempty'),
			)
		)
	);

	public $hasMany = array(
		'Video' => array(
			'className' => 'Video',
			'foreignKey' => 'genre_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
?>