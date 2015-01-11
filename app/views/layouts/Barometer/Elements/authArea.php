<div id="authArea">
<?php if (!Auth::check()): ?>
	<form method="post" action="/login">
		<input type="text" name="email" placeholder="email address" />
		<input type="password" name="password" placeholder="password" />
		<button>Let me in</button>
	</form>
	<small><a data-role="reminder-trigger" href="/remind">I forgot my password</a></small>
<?php else: ?>
	<p>Hello <?= Auth::user()->forename; ?>!</p>
	<nav>
	<ul>
		<li><a data-role="report-in-trigger" href="/report-in">Report in</a></li>
		<li><a href="/mooch">Mooch about</a></li>
		<li><a href="/logout">Log out</a></li>
	</ul>
	</nav>
<?php endif; ?>
</div>