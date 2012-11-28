<?php

class Model_Game extends ORM {
	protected $_has_many = array(
		'places'	=> array('model' => 'Place'),
		'users'	=> array('model' => 'User', 'through' => 'places'),
	);
	
	public function getTime()
	{
		if(!$this->loaded())
			throw new Kohana_Exception('Game object not loaded');

		$czas = $this->time;
		if($czas > 86400)
		{
			$return[] = floor($czas / 86400)."d";
			$czas -= floor($czas / 86400) * 86400;
		}
		if($czas > 3600)
		{
			$return[] = floor($czas / 3600)."h";
			$czas -= floor($czas / 3600) * 3600;
		}
		if($czas > 60)
		{
			$return[] = floor($czas / 60)."m";
			$czas -= floor($czas / 60) * 60;
		}
		if($czas > 0)
		{
			$return[] = floor($czas)."s";
		}
		return implode(' ', $return);
	}
}