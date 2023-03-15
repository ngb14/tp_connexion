<!DOCTYPE html> <html>
<head>
<link rel="stylesheet" href="style.css" />
<meta charset="utf-8" />
</head>
<body>
<?php
//accès à la BDD
require('config.php');
//ouverture d'une session pour l'utilisateur 
session_start();
//test sur la saisie
if (isset($_POST['email'])){
    $email = htmlspecialchars($_POST['email']);
    // $username = htmlspecialchars($_POST['username']); 
    $password = htmlspecialchars($_POST['password']);
    $testpass = hash('sha256', $password);

    //requête pour contrôler dans la table users
    $req = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$testpass' ";
    $select = $connection->query($req);
    $result = $select->fetch();
    //contrôle du résultat et redirection vers page index si OK, message d'erreur sinon
    if($result){
        $_SESSION['email'] = $email;
        header("Location: index.php");
        }
else{
    // sauvegarde d'une variable de session pour plus tard //redirection vers autre page
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
    }
}
?>
<form class="box" action="" method="post" name="login">
<h1 class="box-logo box-title">TP Connexion</h1>
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="email" placeholder="Email"> 
<input type="password" class="box-input" name="password" placeholder="Mot de passe"> 
<input type="submit" value="Connexion" name="submit" class="box-button">

<p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
<?php if (!empty($message)) { ?>
<p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body> 
</html>


