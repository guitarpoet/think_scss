<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style>
<?php
	require_once('SassCompiler.php');
	$c = new SassCompiler();
	$c->compile('themes/default/test.scss');
?>
	</style>
</head>
<body>
	<h1>Hello world</h1>
</body>
</html>

