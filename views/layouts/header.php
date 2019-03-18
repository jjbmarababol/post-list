<?php global $data; ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo (isset($data['title']) ? $data['title'] : "") ?></title>
	<?php if(isset($data['styles'])) : ?>
	<?php foreach ($data['styles'] as $key) : ?>
		<link rel="stylesheet" type="text/css" href="<?php URI::style($key); ?>">
	<?php endforeach ?>
	<?php endif ?>
</head>
<body class="grey lighten-3">
	<nav>
	<div class="nav-wrapper theme-grey-bg">
		<a href="#!" class="brand-logo"><i class="material-icons medium">person_outline</i></a>
		<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
		<ul class="right hide-on-med-and-down">
			<li><a href="?p=dashboard"><i class="material-icons left">home</i>Home</a></li>
			<li><a href="?p=form"><i class="material-icons left">book</i>Form</a></li>
		</ul>
	</div>
</nav>

<ul class="sidenav" id="mobile-demo">
	<li><a href="?p=dashboard"><i class="material-icons left">home</i>Home</a></li>
	<li><a href="?p=form"><i class="material-icons left">book</i>Form</a></li>
</ul>