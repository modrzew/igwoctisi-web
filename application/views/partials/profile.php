<h1><?= $user->username ?></h1>

<ul>
	<li>#<?= $user->getRankingPosition() ?> in ranking (<?= $user->points ?> points)</li>
	<li><?= $user->games->count_all() ?> games played (<?= $user->places->where('place', '=', 1)->count_all() ?> won)</li>
</ul>

<?php if($user->games->count_all() > 0): ?>
<div id="profile-chart" class="pull-right"></div>
<h3>Last 10 games played</h3>

<ul>
<?php
	$pointsChart = array();
	foreach($user->games->order_by('date_played', 'DESC')->limit(10)->find_all() as $g):
		$points = $g->places->where('user_id', '=', $user->id)->find()->points;
		$pointsChart[] = array('date' => $g->date_played, 'points' => $points)
?>
	<li><a href="<?= URL::base().'game/'.$g->id ?>"><?= $g->name ?></a> (<?= ($points > 0) ? '+' : '' ?><?= $points ?>)</li>
<?php endforeach; ?>
</ul>

<ul class="hide" id="pointsChartData">
<?php 
	$points = $user->points;
	foreach($pointsChart as $pc):
?>
	<li>
		<span data-type="date"><?= date('d M \'y', strtotime($pc['date'])) ?></span>
		<span data-type="points"><?= $points ?></span>
	</li>
<?php
	$points -= $pc['points'];
	endforeach;
?>
</ul>
<?php else: ?>
<p>This user has yet to play a game.</p>
<?php endif; ?>