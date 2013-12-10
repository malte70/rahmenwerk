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
	public $data = Array();
	
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
		$this->data["isError"] = false;
		$this->data["meta"] = Array(
			"title" => "Home",
			"description" => "Lorem ipsum dolor sit amet.",
			"url" => $this->app->getBaseURL(),
			"generator" => $this->app->getAppName()
		);
		$this->data["content"] = Array(
			"headerLink" => $this->app->getBaseURL(),
			"headerTitle" => $this->app->getSiteName(),
			"main" => "<p>Foo bar.</p>"
		);
	}
}
?>
