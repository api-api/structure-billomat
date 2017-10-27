<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

require_once dirname ( dirname ( dirname( dirname(__FILE__ ) ) ) ) . '/vendor/autoload.php';

require_once dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) . '/src/Structure_Billomat/Structure_Billomat.php';
require_once dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) . '/src/structure-billomat.php';


require_once dirname(__FILE__ ) . '/test-structure-class.php';

// disable xdebug backtrace
if ( function_exists( 'xdebug_disable' ) ) {
	xdebug_disable();
}