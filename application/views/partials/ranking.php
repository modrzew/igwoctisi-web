<h1>Ranking</h1>

<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>Place</th>
			<th>Username</th>
			<th>Games played</th>
			<th>Points</th>
		</tr>
	</thead>
	<tbody>
<?php
	$place = 0;
	$hiddenPlace = 0;
	$lastPoints = PHP_INT_MAX;
	foreach($ranking as $u):
		$hiddenPlace++;
		if($u->points < $lastPoints)
		{
			$place = $hiddenPlace;
			$lastPoints = $u->points;
		}
?>
		<tr <?php if(($user = Auth::instance()->get_user(FALSE)) AND $user->username == $u->username) echo 'class="info"'; ?>>
			<td><?= $place ?></td>
			<td><a href="<?= Url::base()?>profile/<?= $u->username ?>"><?= $u->username ?></a></td>
			<td><?= $u->games->count_all() ?></td>
			<td><?= $u->points ?></td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>
