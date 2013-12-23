<!-- # v_links_add widget -->

<!-- # List of all links associated with this board ID  -->
	<?php foreach($links as $link): ?>
	<div class="item">
		<a href="<?=$link['href']?>"></a>
	</div>
	<?php endforeach; ?>

