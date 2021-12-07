<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=livreor','root','root');

if(isset($_SESSION['id'])){
   $getid = $_SESSION['id'];
   $article = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
   $article->execute(array($getid));
   $article = $article->fetch();

   if(isset($_POST['submit'])) {

      if(isset($_SESSION['id'],$_POST['comment']) AND !empty($_POST['comment'])) {

         $commentaire = htmlspecialchars(($_POST['comment']));
         if($_SESSION['id']){
             $stmt = $bdd->prepare('INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES (?,?,NOW())');
             $stmt->execute(array($commentaire, $getid));
         }else {
             $msg = 'error';
         }
      } 
   }
}
   
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Commentaire</title>
</head>
<body>
<ul>
        
        <!-- Rajouter les liens pour accueil et contarct -->
        <li><a href="index.php">Accueil</a></li>
        <li><a href="connexion.php">Connexion</a></li>
        <li><a href="inscription.php">Inscription</a></li>
        <li><a href="livreor.php">Livre d'or</a></li>
        <li><a href="commentaire.php">Commentaire</a></li>
        <li style="float:right"><a class="active" href="livreor.html">À-propos</a></li>
    
    </ul>
 
<form action="#" method="POST">
<textarea name="comment" id="" cols="30" rows="10"></textarea>
<input type="submit" value="submit" name="submit">
</form>
    
<button ><a href="deconnexion">Se deconnecter</a></button>
</body>
</html>