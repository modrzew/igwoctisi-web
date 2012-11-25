<?php

class Model_Place extends ORM {
	protected $_belongs_to = array(
		'game' => array('model' => 'Game'),
		'user' => array('model' => 'User'),
	);
	
}