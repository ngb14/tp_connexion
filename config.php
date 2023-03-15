<?php try {
$dns = 'mysql:host=localhost; dbname=registratiion';
$utilisateur = 'root';
$motDePasse = "";
$connection = new PDO( $dns, $utilisateur, $motDePasse );
}
catch (Exception $e) {
echo "Connection à MySQL impossible: ", $e->getMessage();
die();
}
?>