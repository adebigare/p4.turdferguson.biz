
<div id="add_link">
	<form id="add-link-form" method='POST' action='/links/p_add'>

		<div class="add-link">
			<label for='href'><h4>What are you reading?</h4></label>
		</div>
		<div class="link-field">
			<textarea name='href' id='href' placeholder="Post a link to an article! We'll find the title." required></textarea>
			<input type="hidden" value="<?=$timeline_id?>" name="timeline_id">
			<div ><h6 id="results"></h6></div>
			<input class="add_link button small radius" type='submit' value='New link'>
		</div>
	</form>
</div>