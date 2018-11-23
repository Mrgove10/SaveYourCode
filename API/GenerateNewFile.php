<?php

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];

$FileName = $prenom .'-'. $nom;

copy('../Template/Complete.html', '../Saves/'. $FileName .'.html');

header('Location: ../Saves/'.$FileName.'.html'); 

?>