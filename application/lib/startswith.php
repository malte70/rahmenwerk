<?php
/**
 * startswith function
 *
 * @author Malte Bublitz
 * @copyright Copyright (c) 2013 Malte Bublitz, http://malte-bublitz.de
 * @license http://malte-bublitz.de/license/bsd.txt 2-clause BSD license
 */

/**
 * PHP version of the Python function startswith
 * @see http://blog.malte-bublitz.de/php-startswith/
 */
function startswith($string, $start) {
	return (substr($string, 0, strlen($start))==$start);
}

?>
