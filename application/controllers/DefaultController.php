<?php
/**
 * default controller (homepage)
 * @author Malte Bublitz
 */

class DefaultController {
	/**
	 * application object
	 */
	private $app;
	
	/**
	 * constructor, stores application object reference
	 */
	public function __construct($app) {
		$this->app = $app;
	}

	/**
	 * controller's main logic
	 */
	public function main() {
		$this->app->assign("title", "Home page");
		$this->app->view = "homepage";
	}
}
?>
