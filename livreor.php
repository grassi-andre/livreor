
<?php
//id sql
session_start();
$serveur = "localhost";
$dbname = "livreor";
$user = "root";
$pass = "root";


try{ 
    //Connexion BDD 
    $log = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
    $log->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
// Erreur
catch(PDOException $e){
    echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
}
?>


<?php
$insert = $log->prepare("SELECT *FROM utilisateurs INNER JOIN commentaires ON utilisateurs.id  = commentaires.id_utilisateur ");
$comment  = $insert->execute();
?>


  





<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Livre d'or</title>
</head>
<body>
    <?php
    include('header.php')
?>
'
<?php
while($comment= $insert->fetch()){

   echo  $comment['login'] .':'. ' '. $comment['commentaire'] .'   '. $comment['date']. '<br/> <br /><br/>' ;

}
?>
    
</body>
