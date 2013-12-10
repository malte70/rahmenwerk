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
 * include rahmenwerk
 */
require_once("application/rahmenwerk.php");

/**
 * create application object
 */
$app = new \rahmenwerk\Application();

/**
 * configure application
 */
$app->setAppName(CFG_APP_NAME);
$app->setSiteName(CFG_SITE_NAME);
$app->setBaseURL(CFG_SITE_BASEURL);

/**
 * create database object
 */
$app->db = @new mysqli(CFG_DB_HOST, CFG_DB_USER, CFG_DB_PASSWD, CFG_DB_DATABASE);

/**
 * now run the controller
 */
$app->run();

/**
 * initialize the view
 */
$view = new \rahmenwerk\View();

/**
 * configure view
 */
$view->setTemplatePath(CFG_TEMPLATE_PATH);
$view->setTemplateName(CFG_TEMPLATE_NAME);

/**
 * pass data from the controller to the view
 */
$view->loadData($app->getViewData());

/**
 * If an error occured in the controller, tell the view thas this is an error page.
 */
if ($app->getIsError()) {
	$view->setErrorCode($app->getErrorCode());
}

/**
 * let the view send the necessary headers
 */
$view->sendHeaders();

/**
 * display content
 */
$view->sendContent();

?>
