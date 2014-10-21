<?php

/**
 * 
 * @service FortuneSrv
 */
class FortuneSrv
{
	/**
	 * 
	 * @return string
	 */
	public function test()
	{
		//global $config;
		
		//return dirname(__FILE__);
		return config\defaultPath;
	}

	/*
  	* Losujemy fortunk� z wszystkich plik�w w katalogu, b�d� konkretnego pliku 
	* 
	* Funkcja wykorzystuj� skrypt PHP Fortune
	* - je�eli parametr $path wskazuje na katalog to powinna zosta� wykorzystana funkcja quoteFromDir
	* - je�eli parametr wskazuje plik, to funkcja: getRandomQuote
	*/
	
	/**
	*
	* @param string $path
	* @return string
	*/
	function getFortuneStr($path = config\defaultPath)
	{
		$fortune = '';
		$f = new Fortune;
		
		// walidacja $path (�eby unikn�� ../../.. :)) 
		preg_match('/^[a-zA-Z0-9_\-\/]*$/', $path, $path);
		$p = config\baseDir . $path[0];	
		if(is_file($p))
				$fortune = $f->getRandomQuote($p . ".dat"); // to musi by� plik indeksu
		else	$fortune = $f->quoteFromDir($p . "/");
		
		return $fortune;
	}
	
}