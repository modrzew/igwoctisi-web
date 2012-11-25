<?php

class Model_User extends Model_Auth_User {
	protected $_has_many = array(
		'user_tokens'	=> array('model' => 'User_Token'),
		'roles'		=> array('model' => 'Role', 'through' => 'roles_users'),
		'places'		=> array('model' => 'Place'),
		'games'		=> array('model' => 'Game', 'through' => 'places'),
	);
}