<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title; ?></title>
	<link rel="stylesheet" type="text/css" href="/css/styles.css" />
	<?= $scripts; ?>
</head>
<body<?php if (!empty($bodyClasses)): ?>class="<?= implode(" ",$bodyClasses); ?>"<?php endif; ?>>
<?php if (!empty($authArea)) echo $authArea; ?>
<?php if (!empty($content)) echo $content; ?>
</body>
</html>