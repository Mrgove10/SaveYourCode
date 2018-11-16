<?php

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];

$FileName = $prenom .'-'. $nom;

copy('../Template/template.php', '../Saves/'. $FileName .'.php');

header('Location: ../Saves/'.$FileName.'.php'); 

?>