<?php

/**
 * 
 * @service FortuneSrv
 */
class FortuneSrv
{
	
	// Uwaga ponizsze komentarz w stylu javadoc jest umieszczny w opisie wsdl metody
	
	/*
  	 * Losujemy fortunk� z wszystkich plik�w w katalogu, b�d� konkretnego pliku 
	 * 
	 * Funkcja wykorzystuj� skrypt PHP Fortune
	 * - je�eli parametr $path wskazuje na katalog to powinna zosta� wykorzystana funkcja quoteFromDir
	 * - je�eli parametr wskazuje plik, to funkcja: getRandomQuote
	 *
	 *	W wersji Html zwracany jest ci�g ze znacznikami <br> (tak dzia�a wykorzystywana biblioteka)
	 *  funkcja getFortuneStr() zwraca tekst bez znacznik�w html
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
		
		// walidacja $path (�eby unikn�� ../../.. :)) 
		preg_match('/^[a-zA-Z0-9_\-\/]*$/', $path, $path);
		$p = config\baseDir . $path[0];	
		if(is_file($p))
				$fortune = $f->getRandomQuote($p . ".dat"); // to musi by� plik indeksu
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