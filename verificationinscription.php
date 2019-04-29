
<?php //TRAITEMENT INSCRIPTION

session_start();

// Verification champs remplis
if (empty($_POST['nom']) OR empty($_POST['prenom']) OR empty($_POST['mail']) OR empty($_POST['mdp'])OR empty($_POST['adresse']) OR empty($_POST['codepostal'])OR empty($_POST['ville']) OR empty($_POST['pays'])OR empty($_POST['telephone'])OR empty($_POST['numcarte'])OR empty($_POST['nomcarte'])OR empty($_POST['prenomcarte'])OR empty($_POST['expiration']) OR empty($_POST['cvv'])) { //Si un des champs n'est pas renseigné
	header('Location: home.php?erreur=2'); //On redirige vers home avec une erreur
}

$bdd = new PDO('mysql:host=localhost;dbname=amaizon;charset=utf8','root','root');

// Ecriture dans la base de données et accès au site
if (!empty($_POST['nom']) AND! empty($_POST['prenom']) AND! empty($_POST['mail']) AND! empty($_POST['mdp'])AND! empty($_POST['adresse']) AND! empty($_POST['codepostal'])AND! empty($_POST['ville']) AND! empty($_POST['pays'])AND! empty($_POST['telephone'])AND! empty($_POST['numcarte'])AND! empty($_POST['nomcarte'])AND! empty($_POST['prenomcarte'])AND! empty($_POST['expiration']) AND! empty($_POST['cvv'])AND !$erreur) { //On vérifie que tout est OK

	$req = $bdd->prepare('INSERT INTO Utilisateur(nom,prenom,mail,mdp,adresse,codepostal,ville,pays,telephone,type,typecarte,nomcarte,prenomcarte,numcarte,expiration,cvv) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ');
	$req->execute(array($_POST['nom']),($_POST['prenom']),($_POST['mail']),($_POST['mdp']),($_POST['adresse']),($_POST['codepostal']),$_POST['ville']),($_POST['pays']),($_POST['telephone']),($_POST['type']),($_POST['carte']),($_POST['numcarte']),($_POST['nomcarte']),($_POST['prenomcarte']),($_POST['expiration']),($_POST['cvv'])); //On enregistre les infos dans la bdd
	$req = $bdd->prepare('SELECT ID FROM Utilisateur WHERE nom= ?'); //On récupère le nouvel ID utilisateur
	$req->execute(array($_POST['nom'])); 
	$tmp = $req->fetch();
	$req->closeCursor();

	$_SESSION['IDuser'] = $tmp['ID']; //On l'enregistre dans une variable superglobale
	$_SESSION['admin'] = 0; //On définit en tant que non-admin par défaut

	mkdir("Utilisateur/".$tmp['ID'], 0777); //On crée le répertoire du compte sur le serveur
	//header('Location: phy.php'); //On accède au site
}

?>