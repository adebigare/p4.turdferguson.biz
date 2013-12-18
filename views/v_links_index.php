<ul class="user_feed">
<?php foreach($links as $link): ?>

	<li class="post_feed row"><article>
		<div class="large-4 columns">
		<p><?=$link['first_name']?> <?=$link['last_name']?> added:</p> 

		<p class="time"><time datetime="<?=Time::display($link['created'], 'Y-m-d G:i')?>">
			<?=Time::display($link['created'])?>
		</time></p>
		</div>

		<div class="large-8 columns">
		<h4><a href="<?=$link['href']?>"><?=$link['title']?></a></h4>
		</div>

	</article></li>

<?php endforeach; ?>
</ul>