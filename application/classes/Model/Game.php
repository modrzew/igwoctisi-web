<?php

class Model_Game extends ORM {
	protected $_has_many = array(
		'places'	=> array('model' => 'Place'),
		'users'	=> array('model' => 'User', 'through' => 'places'),
	);
	
}