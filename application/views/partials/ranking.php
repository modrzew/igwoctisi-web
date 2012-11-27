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
	$place = 1;
	foreach(ORM::factory('user')->order_by('points', 'ASC')->find_all() as $u):
?>
		<tr <?php if(($user = Auth::instance()->get_user(FALSE)) AND $user->username == $u->username) echo 'class="info"'; ?>>
			<td><?= $place++ ?></td>
			<td><a href="<?= Url::base()?>profile/<?= $u->username ?>"><?= $u->username ?></a></td>
			<td><?= $u->games->count_all() ?></td>
			<td><?= $u->points ?></td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>
