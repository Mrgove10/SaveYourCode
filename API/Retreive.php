<?php
    require_once("../Config/DBConnect.php");

    $ID = $_GET['id'];

    echo("id : ".$ID);

    $reponse = $bdd->query("SELECT * FROM `Main` WHERE `ID`=".$ID);

    // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
    while ($donnees = $reponse->fetch())
    {
        $code = $donnees['ID'];
        printf($code);
    }
    $reponse->closeCursor();


    echo $sql . "<br>" . $e->getMessage();
