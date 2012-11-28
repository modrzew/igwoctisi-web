<h1><?= $game->name ?></h1>

<ul>
	<li>Finished on <?= date('F j, Y', strtotime($game->date_played)) ?> at <?= date('H:i', strtotime($game->date_played)) ?></li>
	<li>It took <?= $game->getTime() ?> to finish this game</li>
</ul>

<h3>Places</h3>

<ol>
<?php foreach($game->places->order_by('place', 'ASC')->find_all() as $p): ?>
	<li><a href="<?= Url::base() ?>profile/<?= $p->user->username ?>"><?= $p->user->username ?></a> (<?= ($p->points < 0) ? '-' : (($p->points > 0) ? '+' : '') ?><?= $p->points ?>)</li>
<?php endforeach; ?>
</ol>
