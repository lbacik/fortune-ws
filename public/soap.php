<?php


require_once ( '../config.php' );

// przy nowej instalacji nale¿ey pamiêtaæ o BUG-u:
// https://code.google.com/p/php-wsdl-creator/issues/detail?id=1
set_include_path(get_include_path() . PATH_SEPARATOR . config\PHPWSDL);
require_once ( 'class.phpwsdl.php' );


// za wzglêdu na: <!-- PHP Fortune - Made by henrik@aasted.org. HP: http://www.aasted.org -->

ob_start();
require_once ( config\FORTUNE11 . '/fortune.php' );
$t = ob_end_clean(); 

PhpWsdl::RunQuickMode ( '../fortuneSoap.php' );
