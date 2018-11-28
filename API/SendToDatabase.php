<?php
  require_once("../Config/DBConnectLocal.php");
  require_once("../Config/DBConnect.php");
  require_once('../lib/phpqrcode/qrlib.php');
  require_once("../Config/mail.php");

  $ID = uniqid();
  $mail = $_POST['mail'];
  $commercial = $_POST['commercial'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $rawCode = $_POST['rawCode'];
  $mysql_date_now = date("Y-m-d H:i:s");

  if($commercial == "on"){
    $commercial = 1;
  }
  else{
    $commercial = 0;
  }
  
  try {
    $sql = "INSERT INTO Main (ID,Mail,UtilisationCommercial,Rawcode,Nom,Prenom,DateAjout) VALUES (?,?,?,?,?,?,?)";
    $bdd->prepare($sql)->execute([$ID,$mail,$commercial,$rawCode,$nom,$prenom,$mysql_date_now]);

    //UNCOMMENT ONLY FOR LOCAL USE
    //$bddLocal->prepare($sql)->execute([$ID,$mail,$commercial,$rawCode,$nom,$prenom,$mysql_date_now]);
    //   $bdd->exec($sql);
    //  echo "New record created successfully";
  }
  catch(PDOException $e)
  {
    echo $sql . "<br>" . $e->getMessage();
  }
 

  //QRcode::png($ID); 

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    curl_setopt($curl, CURLOPT_URL, "https://api.smtp2go.com/v3/email/send");
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array(
      "api_key" => "api-260C516AF30711E8A478F23C91BBF4A0",
      "to" => array(
        0 => $prenom . " " .$nom ."<".$mail.">"
      ),
      "sender" => "Adrien Richard<test@example.com>",
      "subject" => "Ton site WIS/EPSI du Salon de l'etudiant",
      "html_body" => $bodymail

    )));
    echo("<br>");
    echo("<br>");

    $result = curl_exec($curl);

    echo $result;

echo('
<script>
  var timeLeft = 50;
  if( window.localStorage ) {
    if( !localStorage.getItem( \'endTimer\' ) ) {
      localStorage.setItem( \'endTimer\', new Date().getTime() + (timeLeft * 1000) );
    }
  }
</script>
');

?>