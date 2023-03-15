<!DOCTYPE html>
<html> 
<head>
<link rel="stylesheet" href="style.css" />
<meta charset="utf-8" />
</head>
<body>
<?php
//connexion à la BDD
require('config.php');
if (isset($_POST['username'], $_POST['email'], $_POST['password'])) { $username = htmlspecialchars($_POST['username']); $email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
//requête SQL + mot de passe crypté pour insertion
$req_ins = "INSERT into `users` (username, email, password)

VALUES ('$username', '$email', '".hash('sha256', $password)."') "; // Exécuter la requête sur la base de données
$res = $connection->exec($req_ins);
//test si succès de l'insertion
if($res){
echo "<div class='sucess'>
<h3>Vous êtes inscrit avec succès.</h3>
<p>Cliquez ici pour vous <a href='login.php'>connecter</a></p> </div>";
}
}
else{
?>
<form class="box" action="" method="post">
<h1 class="box-logo box-title">Inscription membre TP</h1>
<h1 class="box-title">S'inscrire</h1>
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required /> <input type="text" class="box-input" name="email" placeholder="Email" required />
<input type="password" class="box-input" name="password" placeholder="Mot de passe" required /> <input type="submit" name="submit" value="S'inscrire" class="box-button" />
<p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body> 
</html>

