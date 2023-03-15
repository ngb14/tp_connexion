<?php
// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion 
if(!isset($_SESSION["email"])){
header("Location: login.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
<meta charset="utf-8" />
</head> 
<body>
<div class="sucess">
<h1>Bienvenue <?php echo $_SESSION["email"]; ?>!</h1>
<p>Vous vous êtes bien connecté vous êtes sur l'accueil attendu !!!.</p> <a href="logout.php">Déconnexion</a>
</div>
</body>
</html>

