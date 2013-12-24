	<?php if(isset($none)): ?>
		<div id="none" class="stamp">
		<h2>It looks like you're not following anyone.</h2>
		<h3>In order for timelines to start showing up here, navigate to the collaborators tab in the the menu and start following some people!</h3>
		</div>
	<?php endif; ?>

	<ul class="timeline_feed">
	<?php foreach($timelines as $timeline): ?>

		<li class="item"><article>

			<h3><?=$timeline['title']?></h3> 
			<a href="/timelines/detail/<?=$timeline['timeline_id']?>">See stories...</a>
		</article></li>

	<?php endforeach; ?>
	</ul>
