<?php
App::uses('AppModel', 'Model');

class Video extends AppModel
{
	public $displayField = 'title';

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
	
	function getVideoComments($videoId, $page = 1, $limit = DEFAULT_PAGE_LIMIT)
	{
		$page = ($page - 1) * $limit;
		$sql = 'SELECT 
							Comment.id, Comment.description, Comment.created, 
							User.name
						FROM 
							comments Comment, users User 
							WHERE 
								Comment.user_id = User.id 
							AND 
								Comment.video_id = ' . intval($videoId) . ' 
							ORDER BY 
								Comment.created DESC 
							LIMIT ' . $page . ', ' . $limit;	
		
		return $this->query($sql);
	}
}
?>