<?php

$proizvodjac = $_POST['proizvodjac'];
$artikal = $_POST['artikal'];
$ncena = $_POST['ncena'];
$marza = $_POST['marza'];

mysqli_query("insert into proizvod values (null, '$proizvodjac','$artikal','$ncena','$marza')");