<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="<?= Url::base() ?>assets/js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="<?= Url::base() ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?= Url::base() ?>assets/js/main.js"></script>
		<link rel="stylesheet" type="text/css" href="<?= Url::base() ?>assets/styles/bootstrap.min.css" />
		<link rel="stylesheet/less" type="text/less" href="<?= Url::base() ?>assets/styles/style.less" />
		<script type="text/javascript" src="<?= Url::base() ?>assets/js/less-1.3.1.min.js"></script>
		<script type="text/javascript" src="<?= Url::base() ?>assets/js/highcharts.js"></script>
		<script type="text/javascript" src="<?= Url::base() ?>assets/js/main.js"></script>
		<meta charset="utf-8">
		<title>IGWOCTISI</title>
	</head>

	<body>
		<div class="container">
			<div class="masthead">
<?php if(Auth::instance()->logged_in()): ?>
				<div class="dropdown pull-right">
					<a class="btn" href="<?= Url::base() ?>ranking">ranking</a>
					<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
						<?= $user = Auth::instance()->get_user()->username ?>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu pull-right">
						<li><a href="<?= Url::base() ?>profile/<?= $user ?>"><i class="icon-user"></i> Profile</a></li>
						<li class="divider"></li>
						<li><a href="<?= Url::base() ?>logout"><i class="icon-off"></i> Logout</a></li>
					</ul>
				</div>
<?php else: ?>
				<ul class="nav nav-pills pull-right">
					<li><a class="btn" href="<?= Url::base() ?>login">Login</a></li>
					<li><a class="btn" href="<?= Url::base() ?>signup">Sign up</a></li>
				</ul>
<?php endif; ?>
				<h3 class="muted">IGWOCTISI</h3>
			</div>

<?php if($msg = Session::instance()->get_once('msg', FALSE)): ?>
<p class="lead text-<?= $msg[0] ?>"><?= $msg[1] ?></p>
<?php endif; ?>

			<?= $content ?>

		</div>
	</body>
</html>