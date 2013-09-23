<?php
/**
 * application main file.
 *
 * loads the configuration, configures rahmenwerk and
 * lets rahmenwerk do the rest of the magic.
 *
 * @author Malte Bublitz
 * @copyright Copyright (c) 2013 Malte Bublitz, http://malte-bublitz.de. All rights reserved.
 * @license http://malte-bublitz.de/license/bsd.txt 2-clause BSD license
 */

require_once("application/config.php");

/**
 * error reporting. comment out E_ALL and E_ERROR in for productive use, and
 * the other way around for debugging use.
 */
if (CFG_DEBUG) {
	ini_set('error_reporting', true);
	error_reporting(E_ALL);
} else {
	ini_set('error_reporting', false);
	error_reporting(0);
}

/**
 * start the session
 */
session_start();

/**
 * include rahmenwerk
 */
require_once("application/rahmenwerk.php");

/**
 * create application object
 */
$app = new Application();

/**
 * configure application
 */
$app->appname = CFG_APP_NAME;
$app->baseurl = CFG_APP_BASEURL;

/**
 * parse url
 */
if (isset($_SERVER["PATH_INFO"])) {
	$app->url_elements = explode("/", trim($_SERVER["PATH_INFO"], "/"));
}

/**
 * create database object
 */
$app->db = @new mysqli(CFG_DB_HOST, CFG_DB_USER, CFG_DB_PASSWD, CFG_DB_DATABASE);

/**
 * now let the Application do the magic!
 */
$app->run();
?>
