<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style>
	.red {
		background-color: red;
		height: 100px;
	}
<?php
	require_once('SassCompiler.php');
	$c = new SassCompiler();
	$c->resolutions = array(640, 960, 1024, 1280, 1440, 1920);
	$c->widget('panel');
	$c->compile('test');
?>
	</style>
</head>
<body>
	<div class="container">
		<div class="panel red"></div>
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

