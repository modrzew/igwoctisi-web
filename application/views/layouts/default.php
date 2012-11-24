<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="<?= Url::base() ?>assets/js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="<?= Url::base() ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?= Url::base() ?>assets/js/main.js"></script>
		<link rel="stylesheet" type="text/css" href="<?= Url::base() ?>assets/styles/bootstrap.min.css" />
		<link rel="stylesheet/less" type="text/less" href="<?= Url::base() ?>assets/styles/style.less" />
		<script type="text/javascript" src="<?= Url::base() ?>assets/js/less-1.3.1.min.js"></script>
		<script type="text/javascript" src="<?= Url::base() ?>assets/js/main.js"></script>
		<meta charset="utf-8">
		<title>IGWOCTISI</title>
	</head>

	<body>
		<div class="container">
			<div class="masthead">
				<ul class="nav nav-pills pull-right">
<!-- 					<li class="active"><a href="#">Main</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Contact</a></li> -->
				</ul>
				<h3 class="muted">IGWOCTISI</h3>
			</div>
			
			<?= $content ?>

		</div>
	</body>
</html>