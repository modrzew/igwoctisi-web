<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Controller_Template {
	public $template = 'layouts/default';

	public function action_index()
	{
		if(Auth::instance()->logged_in())
		{
			$user = Auth::instance()->get_user();
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
			$post->rule('password2', 'matches', array(':validation', 'password2', 'password'));
			$post->rule('email', 'email');
			if($post->check())
			{
				$valid = TRUE; // Kohana is stupid
				$user = ORM::factory('User')->where('username', '=', $post['username'])->find();
				if($user->loaded())
				{
					$post->error('username', 'this username is taken');
					$valid = FALSE;
				}
				$user = ORM::factory('User')->where('email', '=', $post['email'])->find();
				if($user->loaded())
				{
					$post->error('email', 'this e-mail is already in use');
					$valid = FALSE;
				}
				if($valid)
				{
					$user = ORM::factory('User')->values(array(
						'username' => $post['username'],
						'password' => $post['password'],
						'password_confirm' => $post['password'],
						'email' => $post['email'],
					));
					try
					{
						$user->save();
					}
					catch (Exception $e)
					{
						die(Debug::vars($e));
					}
					$user->add('roles', ORM::factory('Role', 1));
					Auth::instance()->login($post['username'], $post['password']);
					Session::instance()->set('msg', array('success', 'Thanks! You have been automagically signed in.'));
					$this->redirect('/');
				}
				else
				{
					$this->template->content->data = $post->data();
					$this->template->content->errors = $post->errors('');
					Session::instance()->set('msg', array('error', 'Something went bad while trying to register.'));
				}
			}
			else
			{
				$this->template->content->data = $post->data();
				$this->template->content->errors = $post->errors('');
				Session::instance()->set('msg', array('error', 'Something went bad while trying to register.'));
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
				Session::instance()->set('msg', array('success', 'Successfully logged in.'));
				$this->redirect('index');
			}
			else
			{
				$this->template->content->loginFailed = TRUE;
				Session::instance()->set('msg', array('error', 'Wrong username or password.'));
			}
		}
	}

	
	public function action_logout()
	{
		Auth::instance()->logout();
		Session::instance()->set('msg', array('success', 'Successfully logged out.'));
		$this->redirect('index');
	}
	
	
	public function action_ranking()
	{
		$this->template->content = View::factory('partials/ranking');
		$this->template->content->ranking = ORM::factory('User')->order_by('points', 'DESC')->order_by('username', 'ASC')->find_all();
	}

	
	
	public function action_profile()
	{
		$username = $this->request->param('id');
		if(!$username)
			throw new HTTP_Exception_500('Empty username');
		$user = ORM::factory('User')->where('username', '=', $username)->find();
		if(!$user->loaded())
			throw new HTTP_Exception_500('Unable to load user');
		$this->template->content = View::factory('partials/profile');
		$this->template->content->user = $user;
	}
	

	
	public function action_game()
	{
		$gameId = $this->request->param('id');
		if(!$gameId)
			throw new HTTP_Exception_500('Empty game ID');
		$game = ORM::factory('Game')->where('id', '=', $gameId)->and_where('status', '=', 2)->find();
		if(!$game->loaded())
			throw new HTTP_Exception_500('Unable to load game');
		$this->template->content = View::factory('partials/game');
		$this->template->content->game = $game;
	}
	
} // End Main
