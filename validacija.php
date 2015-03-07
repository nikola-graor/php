<?php
require 'konekcija.php';

	$provera = array ('proizvodjac', 'artikal', 'ncena', 'pcena');

	foreach($_POST as $key => $value){

		if (in_array($key, $provera)){

			if (isset($_POST[$key]) && !empty($_POST[$key])){
				$$key = proveri($key);
			}else{
				die("Morate uneti sve parametre!!!");
			}
		}
	}


	echo "<b><i>UNETI PODACI:</i></b><br />Proizvođač: $proizvodjac<br />Artikal: $artikal<br />Nabavna cena: $ncena<br />Prodajna cena: $pcena";

	$proizvodjac = $db->real_escape_string($proizvodjac);
	$artikal = $db->real_escape_string($artikal);
	$ncena = $db->real_escape_string($ncena);
	$pcena = $db->real_escape_string($pcena);

	if ($db->query("INSERT INTO proizvod (proizvodjac,aritkal,ncena,pcena) VALUES ('{$proizvodjac}','{$artikal}','{$ncena}','{$pcena}')")){
		echo "<br />Uspesno ste uneli proizvod u bazu";
	}else{
		echo "<br />Greška pri unosu u bazu";
	};


	function proveri($key) {        

		$value = $_POST[$key];
		$value = trim($value);
		$value = htmlspecialchars($value);
		switch ($key) {
			case 'proizvodjac':
			case 'artikal':
				if (!ctype_alpha($value) || strlen($value)<2){
					die ("Ovde mogu biti uneta samo slova");
				}
				return $value;
				break;
			case 'ncena':
			case 'pcena':
				if (!ctype_digit($value) || strlen($value)<2){
					die ('Greška prilikom unosa cene');
				}
			default:
				echo "Greška";
				break;
		}
	}
	
?>