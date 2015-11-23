<?php
require '../vendor/autoload.php';

$jsonx = new danharper\JSONx\JSONx;

$incomingXml = @$_POST['xml'];
$incomingJson = @$_POST['json'];

$json = $incomingXml ? json_encode($jsonx->fromJSONx($incomingXml), JSON_PRETTY_PRINT) : $incomingJson;
$xml = $incomingJson ? $jsonx->toJSONx(json_decode($incomingJson)) : $incomingXml;
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>JSONx</title>
	<style>
		body { font-family: sans-serif; }
		textarea { display: block; font-family: monospace; }
	</style>
</head>
<body>

	<h2>JSON → XML</h2>

	<form method="POST">
		<textarea name="json" placeholder="Enter JSON here" cols="120" rows="25"><?= $json ?></textarea>
		<button type="submit">To XML</button>
	</form>

	<h2>XML → JSON</h2>

	<form method="POST">
		<textarea name="xml" placeholder="Enter XML here" cols="120" rows="25"><?= $xml ?></textarea>
		<button type="submit">To JSON</button>
	</form>	

</body>
</html>