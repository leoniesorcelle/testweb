<?php // TRAITEMENT CONNEXION

session_start(); //Pour pouvoir enregistrer des variables surpeglobales de type SESSION

$bdd = new PDO('mysql:host=localhost;dbname=amaizon;charset=utf8','root','root'); //On accède à la base de données

$req = $bdd->query('SELECT ID,nom,prenom,mail,mdp,adresse,codepostal,ville,pays,telephone,type,typecarte,nomcarte,prenomcarte,numcarte,expiration,cvv,admin FROM Utilisateur'); 
$success = false; //Booléen pour savoir si connexion autorisée

while ($tmp = $req->fetch()) { //On parcours tout les pseudo/mdp

	if ($_POST['mail'] == $tmp['mail'] AND $_POST['mdp'] == $tmp['mdp']) { // Si le pseudo/mdp donnés sont bien présents dans la bdd
		$success = true; //Connexion autorisée
		$_SESSION['IDuser'] = $tmp['ID']; //On définit une variable superglobale de type SESSION contenant l'ID de l'utilisateur

		if ($tmp['admin'])
			$_SESSION['admin'] = 1; //Booléen superglobal pour savoir si l'utilisateur est admin ou non
		else
			$_SESSION['admin'] = 0;
	}
}

$req -> closeCursor();

 Redirection
if ($success) {
	header('Location: phy.php'); //Connexion réussie, on rentre dans le site
}
if (!$success) {
	header('Location: home.php?erreur=1'); //Renvoie vers la page home avec une erreur

}
*/
?>