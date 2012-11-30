<div class="jumbotron">
	<h1>You're logged in!</h1>
	<a class="btn btn-success btn-large" href="<?= URL::base() ?>profile/<?= Auth::instance()->get_user()->username ?>">View your profile</a>
	<a class="btn btn-success btn-large" href="<?= URL::base() ?>ranking">View ranking</a>
</div>
