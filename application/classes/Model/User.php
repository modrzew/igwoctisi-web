<?php

class Model_User extends Model_Auth_User {
	protected $_has_many = array(
		'user_tokens'	=> array('model' => 'User_Token'),
		'roles'		=> array('model' => 'Role', 'through' => 'roles_users'),
		'places'		=> array('model' => 'Place'),
		'games'		=> array('model' => 'Game', 'through' => 'places'),
	);
	
	public function getRankingPosition()
	{
		if(!$this->loaded())
			throw new Kohana_Exception('User object not loaded');
		
		$ranking = ORM::factory('user')->order_by('points', 'DESC')->order_by('username', 'ASC')->find_all();
		$place = 0;
		$hiddenPlace = 0;
		$lastPoints = PHP_INT_MAX;
		foreach($ranking as $u)
		{
			$hiddenPlace++;
			if($u->points < $lastPoints)
			{
				$place = $hiddenPlace;
				$lastPoints = $u->points;
			}
			if($u->username === $this->username)
				break;
		}
		return $place;
	}
}