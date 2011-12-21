<?php
class AppController extends Controller
{
	var $components = array(
											'Session'
										);
	
	function checkLogin()
	{
		$userId = $this->Session->read('User.id');
		
		if (!empty($userId))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
}
?>