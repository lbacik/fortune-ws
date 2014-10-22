<?php

/**
 * 
 * @service FortuneSrv
 */
class FortuneSrv
{
	
	// Uwaga ponizsze komentarz w stylu javadoc jest umieszczny w opisie wsdl metody
	
	/*
  	 * Losujemy fortunkê z wszystkich plików w katalogu, b¹dŸ konkretnego pliku 
	 * 
	 * Funkcja wykorzystujê skrypt PHP Fortune
	 * - je¿eli parametr $path wskazuje na katalog to powinna zostaæ wykorzystana funkcja quoteFromDir
	 * - je¿eli parametr wskazuje plik, to funkcja: getRandomQuote
	 *
	 *	W wersji Html zwracany jest ci¹g ze znacznikami <br> (tak dzia³a wykorzystywana biblioteka)
	 *  funkcja getFortuneStr() zwraca tekst bez znaczników html
	 */
	
	/**
	 * 
	 * @param string $path
	 * @return string
	 */
	public function getFortuneHtml($path = config\defaultPath)
	{
		$fortune = '';
		$f = new Fortune;
		
		// walidacja $path (¿eby unikn¹æ ../../.. :)) 
		preg_match('/^[a-zA-Z0-9_\-\/]*$/', $path, $path);
		$p = config\baseDir . $path[0];	
		if(is_file($p))
				$fortune = $f->getRandomQuote($p . ".dat"); // to musi byæ plik indeksu
		else	$fortune = $f->quoteFromDir($p . "/");
		
		return $fortune;
	}

	/**
	 * 
	 * @param string $path
	 * @return string
	 */
	public function getFortuneStr($path = config\defaultPath)
	{
		return strip_tags($this->getFortuneHtml($path));	
	}
	
}