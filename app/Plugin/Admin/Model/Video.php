<?php
App::uses('AppModel', 'Model');

class Video extends AppModel
{
	public $displayField = 'title';

	public $validate = array(
		'title' => array(
				'notempty' => array(
  				'rule' => array('notempty'),
			)
		),
		'description' => array(
		    'notempty' => array(
		      'rule' => array('notempty'),
		  )
		),
		'language_id' => array(
		  'numeric' => array(
		    'rule' => array('numeric'),
		  )
		),
		'genre_id' => array(
		  'numeric' => array(
		  'rule' => array('numeric'),
		  )
		),
	);
  
  // Associations
	public $belongsTo = array(
		'Language' => array(
			'className' => 'Language',
			'foreignKey' => 'language_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Genre' => array(
			'className' => 'Genre',
			'foreignKey' => 'genre_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>