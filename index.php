<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style>
<?php
	require_once('SassCompiler.php');
	$c = new SassCompiler();
	$c->lib('bootstrap', '3.3.0');
	$c->compile('_bootstrap.scss', 'test.scss');
?>
	</style>
</head>
<body>
	<div class="container">
		<div id="nav" class="col-xs-3">
		</div>
		<div id="main" class="col-xs-9">
			<div class="row toolbar">
				<h1>Hello world</h1>
				<a href="#" class="btn btn-primary">Test</a>
			</div>
		</div>
	</div>
</body>
</html>

