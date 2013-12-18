<div id="add_timeline" class="row">
	<form method='POST' action='/timelines/p_add'>

		<div class="large-12 columns">
			<h4>Start A New Timeline</h4>
		</div>
		<div class="large-8 columns">
			<textarea name='title' id='title' placeholder="Red Sox World Series" required></textarea>
			<textarea name='href' id='href' placeholder="www.bostonglobe.com" required></textarea>
			<label>Choose A Category</label>
				<select>
					<?php foreach ($topics as $topic): ?>
					<option value='<?=$topic['topic_id']?>'><?=$topic['name']?></option>
					<?php endforeach; ?>
				</select>			
      <input class="add_link button small radius" type='submit' value='Create Timeline'>
		</div>

	</form>
</div>