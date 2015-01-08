<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title; ?></title>
</head>
<body<?php if (!empty($bodyClasses)): ?>class="<?= implode(" ",$bodyClasses); ?>"<?php endif; ?>>
<?php if (!empty($authArea) && Auth::check()) echo $authArea; ?>
<?php if (!empty($content)) echo $content; ?>
</body>
</html>