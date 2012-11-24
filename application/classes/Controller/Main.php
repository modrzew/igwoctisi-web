<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Controller_Template {
	public $template = 'layouts/default';

	public function action_index()
	{
		if(Auth::instance()->logged_in())
		{
			$this->template->content = View::factory('partials/mainLogged');
		}
		else
		{
			$this->template->content = View::factory('partials/mainNotLogged');
		}
	}
} // End Main
