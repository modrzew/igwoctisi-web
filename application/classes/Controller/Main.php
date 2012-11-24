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
	
	
	public function action_signup()
	{
		$this->template->content = View::factory('partials/signup');
		if($this->request->method() == 'POST')
		{
			$post = Validation::factory($this->request->post());
			$post->rule('username', 'not_empty');
			$post->rule('password', 'not_empty');
			$post->rule('password2', 'not_empty');
			$post->rule('email', 'not_empty');
			$post->rule('password', 'matches', array(':validation', 'password2', 'password'));
			$post->rule('email', 'email');
			if($post->check())
			{
				$valid = TRUE; // Kohana is stupid
				$user = ORM::factory('user')->where('username', '=', $post['username'])->find();
				if($user->loaded())
				{
					$post->error('username', 'this username is taken');
					$valid = FALSE;
				}
				if($valid)
				{
					$user = ORM::factory('user')->values(array(
						'username' => $post['username'],
						'password' => $post['password'],
						'email' => $post['email'],
					))->save();
					$user->add('roles', ORM::factory('role', 1));
				}
				else
				{
					$this->template->content->data = $post->data();
					$this->template->content->errors = $post->errors('');
				}
			}
			else
			{
				$this->template->content->data = $post->data();
				$this->template->content->errors = $post->errors('');
			}
		}
	}

	
	
	public function action_login()
	{
		$this->template->content = View::factory('partials/login');
		if($this->request->method() == 'POST')
		{
			$post = $this->request->post();
			if(Auth::instance()->login($post['username'], $post['password']))
			{
				$this->redirect('main/index');
			}
			else
			{
				$this->template->content->loginFailed = TRUE;
			}
		}
	}

	
	public function action_logout()
	{
		Auth::instance()->logout();
		$this->redirect('main/index');
	}
} // End Main
