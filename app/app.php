<?php
/**
 * application class
 * mainly stores information
 *
 * @author Malte Bublitz
 */

class Application {
	/**
	 * content type
	 * @param string
	 */
	public $content_type = "text/html";
	
	/**
	 * encoding
	 * @param string
	 */
	public $encoding = "utf-8";
	
	/**
	 * application name
	 * @param string
	 */
	public $appname = "rahmenwerk Application";
	
	/**
	 * base URL
	 * @param string
	 */
	public $baseurl = 'http://example.com/';
	
	/**
	 * database object
	 * @param mysqli object instance
	 */
	public $db;
	
	/**
	 * URL elements
	 * @param array
	 */
	public $url_elements = array();
	
	/**
	 * controller
	 * @param object
	 */
	public $controller;
	
	/**
	 * view to use
	 * decision made by the controller
	 * @param string
	 */
	public $view = "";
	
	/**
	 * data to display
	 * @param array
	 */
	public $display_data = array();
	
	/**
	 * assign variables for the template
	 */
	public function assign($key, $value) {
		$this->display_data[$key] = $value;
	}
	
	/**
	 * get display data
	 */
	public function get($key) {
		return $this->display_data[$key];
	}
	
	/**
	 * run the application
	 */
	public function run() {
		/**
		 * guess controller name
		 */
		if (@class_exists(ucfirst($this->url_elements[0])."Controller")) {
			$controller_name = ucfirst($this->url_elements[0])."Controller";
		} else {
			$controller_name = "DefaultController";
		}
		
		/**
		 * create controller object
		 */
		$this->controller = new $controller_name($this);
		$this->controller->main();
		
		/**
		 * display template
		 */
		require_once("./app/templates/header.php");
		$view_content = file_get_contents("./app/views/".$this->view.".html");
		foreach ($this->display_data as $key => $value) {
			$view_content = str_replace("{%".$key."%}", $value, $view_content);
		}
		print $view_content;
		require_once("./app/templates/footer.php");
	}
}
?>