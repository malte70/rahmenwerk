<?php
/**
 * rahmenwerk main file
 *
 * parses the request and launches tha application
 *
 * @author Malte Bublitz
 * @copyright Copyright (c) 2013 Malte Bublitz, http://malte-bublitz.de. All rights reserved.
 * @license http://malte-bublitz.de/license/bsd.txt 2-clause BSD license
 */

/**
 * error reporting. comment out E_ALL and E_ERROR in for productive use, and
 * the other way around for debugging use.
 */
error_reporting(E_ALL);
error_reporting(E_ERROR);

/**
 * start the session
 */
session_start();

/**
 * require file containing application object
 */
require_once("app/app.php");

/**
 * autoload function
 */
function autoload_class($class_name) {
	$search_paths = array(
		"./app/controllers/",
		"./app/model/"
	);
	foreach ($search_paths as $path) {
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
 * create main object
 */
$app = new Application();

/**
 * parse url
 */
if (isset($_SERVER["PATH_INFO"])) {
	$app->url_elements = explode("/", trim($_SERVER["PATH_INFO"], "/"));
}

/**
 * create database object
 */
$app->db = new mysqli(
	"localhost",
	"rahmenwerk",
	"foobar",
	"rahmenwerk"
);

/**
 * now let the Application do the magic!
 */
$app->run();
?>
