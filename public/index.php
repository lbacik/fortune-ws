<?php

// przy nowej instalacji nale¿ey pamiêtaæ o BUG-u:
// https://code.google.com/p/php-wsdl-creator/issues/detail?id=1

set_include_path(get_include_path() . PATH_SEPARATOR . '../php-wsdl-2.3');
require_once ( 'class.phpwsdl.php' );
require_once ( '../config.php' );
//require_once ( 'sql.php' );

// za wzglêdu na: <!-- PHP Fortune - Made by henrik@aasted.org. HP: http://www.aasted.org -->

ob_start();
require_once ( '../fortune11/fortune.php' );
$t = ob_end_clean(); 

PhpWsdl::RunQuickMode ( '../fortuneSoap.php' );
