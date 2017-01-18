<!DOCTYPE html>
<html>
<head>
<title>Filmovi</title>
</head>
<body>
</body>
</html>

<?php

class baza extends mysqli
{
	function __construct()
	{
		parent::__construct('localhost', 'root', '', 'kolekcija');
	}
}

class film
{
	private $db;
	
	function __construct()
	{
		$this->db = new baza();
	}
	
	function dohvati()
	{
		return $this->upit("SELECT * FROM filmovi");
	}
	
	function odaberiFilm($film)
	{
		return $this->upit("SSELECT f.naziv_filma, f.godina, f.trajanje, f.slika, z.naziv
							FROM filmovi f, zanr z
							WHERE f.id_zanr = z.id
							ND f.naziv_filma = '". $film ."'
							ORDER BY f.naziv_filma ASC");
	}
	
	function upit($sql)
	{
		$rez = $this->db->query($sql);
		return $rez->fetch_all();
	}
}


	$slova[] = "A";
	$slova[] = "B";
	$slova[] = "C";
	$slova[] = "D";
	$slova[] = "E";
	$slova[] = "F";
	$slova[] = "G";
	$slova[] = "H";
	$slova[] = "I";
	$slova[] = "J";
	$slova[] = "K";
	$slova[] = "L";
	$slova[] = "M";
	$slova[] = "N";
	$slova[] = "O";
	$slova[] = "P";
	$slova[] = "R";
	$slova[] = "S";
	$slova[] = "T";
	$slova[] = "U";
	$slova[] = "V";
	$slova[] = "Z";
	$slova[] = "Ž";
	
	echo "|";
	foreach ( $slova as $slovo )
	{
		echo '| <a href="?slovo='.$slovo.'">'.$slovo.'</a> |';
		echo "|";
	}

	if ( isset($_GET['slovo']) )
	{
	
	$f = new film();

$podaci = $f->upit("SELECT f.naziv_filma, f.godina, f.trajanje, f.slika, z.naziv
					FROM filmovi f, zanr z
					WHERE f.id_zanr = z.id
					AND f.naziv_filma LIKE '".$_GET['slovo']."%'
					ORDER BY f.naziv_filma ASC");

foreach($podaci as $p)
{
	echo "<br />";
	echo $p[0] . '<br />';
	echo $p[1] . '<br />';
	echo $p[2] . '<br />';
	echo $p[3] . '<br />';
	echo $p[4] . '<br />';
}
}

?>