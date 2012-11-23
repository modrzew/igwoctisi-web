<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{
		$u = ORM::factory('user')->find_all();
		$this->response->body('hello, world!');
	}

} // End Welcome
