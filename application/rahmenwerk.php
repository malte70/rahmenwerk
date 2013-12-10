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

?>
