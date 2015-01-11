<form method="post" action="/statuses" data-role="status-creator">
<h2>How you doin?</h2>
<div>
	<label>Pick a scheme</label>
	<select name="status[scheme_id]" data-role="scheme-select">
	<?php foreach ($schemes AS $scheme): ?>
		<option value="<?= $scheme->id; ?>" <?= ($selectedScheme->id==$scheme->id) ? 'selected="selected"' : ''; ?>><?= $scheme->label; ?></option>
	<?php endforeach; ?>
	</select>
</div>
<div data-role="status-picker-container">
	<p data-behvaiour="show-on-hover">Well....I would have to say I am......</p>
	<?php foreach ($statuses AS $statusID=>$status): ?>
		<button data-role="status-picker" data-status-id="<?= $statusID; ?>" class="status-button <?= (!empty($selectedStatusID) && $selectedStatusID==$statusID) ? 'selected' : ''; ?>">
			<img src="<?= empty($status->imageURL) ? '/images/status-placeholder.png' : $status->imageURL; ?>" alt="<?= $status->caption; ?>" />
			<?= $status->caption; ?>
		</button>
	<?php endforeach; ?>
</div>
</form>