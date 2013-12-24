
<!-- # List of all links associated with this board ID  -->
	<?php foreach($links as $link): ?>
	<div class="item">
		<h3><?=Time::display($link['created'])?></h3>
		<a href="<?=$link['href']?>"></a>
		<p>Added by <?=$link['first_name']?> <?=$link['last_name']?></p>
	</div>
	<?php endforeach; ?>

