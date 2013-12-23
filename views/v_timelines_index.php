<div id="container">
	<ul class="timeline_feed">
	<?php foreach($timelines as $timeline): ?>

		<li class="item"><article>

			<h2><?=$timeline['title']?></h2> 
			<a href="/timelines/detail/<?=$timeline['timeline_id']?>">See more...</a>
		</article></li>

	<?php endforeach; ?>
	</ul>
</div>