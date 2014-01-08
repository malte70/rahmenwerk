<?php
/**
 * rahmenwerk main file
 *
 * loads all needed files, which are in separate files.
 *
 * @author Malte Bublitz
 * @copyright Copyright (c) 2013 Malte Bublitz, http://malte-bublitz.de. All rights reserved.
 * @license http://malte-bublitz.de/license/bsd.txt 2-clause BSD license
 */

require_once("lib/startswith.php");

/**
 * autoload function
 */
function autoload_class($class_name) {
	$search_paths = array(
		"./application/controllers/",
		"./application/classes/"
	);
	foreach ($search_paths as $path) {
		if (startswith($class_name, "rahmenwerk\\"))
			$class_name = substr($class_name, strlen("rahmenwerk\\"));
		$file_name = $path.$class_name.".php";
		if (file_exists($file_name)) {
			include_once($file_name);
			break;
		}
	}
}

/**
 * register the autoload function.
 */
spl_autoload_register("autoload_class");

/**
 * exception handler
 *
 * shows an error page if debugging is enabled, otherwise a nice
 * message for the user with a "guru meditation"
 */
function rahmenwerk_exception($e) {
	$guru = "Message: ".$e->getMessage()."\nContext: ".$e->getFile().", l. ".$e->getLine()."\nTrace:\n".$e->getTraceAsString();
	$guru = base64_encode($guru);
	// override headers that might be already sent
	@header("Content-Type: text/html; charset=UTF-8");
	header("Status: 500 Internal Server Error");
	header("HTTP/1.0 500 Internal Server Error");
	echo <<<EOT
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Sorry. There was an internal error :(</title>
		<style type="text/css">
			div {width: 500px; margin: 50px auto; background: #DDD; border: 1x solid #BFBFBF;}
			h2 {font: 18pt sans-serif;}
			code {width: 100%;word-wrap: break-word; margin: 15px; font-family: "Inconsolata-g",monospace;}
		</style>
	</head>
	<body>
		<div>
			<h2>Sorry. There was an internal error :(</h2>
			<code class="guru-meditation">
Guru Meditation:<br>
$guru
			</code>
		</div>
	</body>
</html>
EOT;
}

set_exception_handler("rahmenwerk_exception");
?>
