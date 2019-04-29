<?php 
//On déconnecte l'utilisateur dès qu'il revient sur la page home 
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"] );
}
session_destroy();
?> 

<!DOCTYPE html>
<html>

<!-- HEAD -->
<head>
    <meta charset="UTF-8" />
</head>

<!-- BODY -->
<body>

    <!-- FORMULAIRES -->
    <div id="conteneur"> 

        <!-- Bloc Connexion -->
        <div id="connexion">
            <h1>Connexion</h1>
            <form method="post" action="verificationconnexion.php"> <!-- Formulaire pour la connexion -->
                <?php if($_GET['erreur'] == 1) { ?><label>Incorrect, Réessayez.</label><br/> <?php } ?> <!-- Si erreur dans les entrées (mdp invalide ou champ non renseigné) -->
                <input type="text" name="email" size="20" placeholder="Email" autofocus/><br/>
                <input type="password" name="mdp" size="20" placeholder="Mot de passe"/><br/>
                <input type="submit" value="Connexion" />
            </form>
        </div>

        <!-- Bloc Inscription -->
        <div id="inscription">
            <h1>Inscription</h1>
            <form method="post" action="verificationinscription.php"> <!-- Formulaire pour l'inscription -->
                <?php if($_GET['erreur'] == 2) { ?> <label>Remplissez tout les champs</label><br/> <?php } ?> <!-- Si erreur -->
                <?php if($_GET['erreur'] == 3) { ?> <label>Pseudo déjà utilisé</label><br/> <?php } ?> <!-- Si erreur -->
                <input type="text" name="nom" size="40" placeholder="Nom"/>
                <input type="text" name="prenom" size="40" placeholder="Prenom"/>
                <br/>
                <input type="text" name="mail" size="60" placeholder="Mail"/>
                <input type="password" name="mdp" size="20" placeholder="Mot de passe"/>
                <br/>
                <input type="text" name="adresse" size="30" placeholder="Adresse"/>
                <br/>
                <input type="number" name="codepostal" size="20" placeholder="Code Postal"/>
                <input type="text" name="ville" size="20" placeholder="Ville"/>
                <input type="text" name="pays" size="20" placeholder="Pays"/>
                <br/><br/>
                <input type="number" name="telephone" size="20" placeholder="Numero de Telephone"/>
                <br/>
                <label> Type : </label>
                <br/>
                <input type="radio" name="type" value=1 checked="checked" id="acheteur" /> <label for="acheteur">Acheteur</label>
                <input type="radio" name="type" value=0 id="vendeur" /> <label for="vendeur">Vendeur</label>
                <input type="radio" name="type" value=2 id="vendeur/acheteur" /> <label for="vendeur/acheteur">Vendeur/Acheteur</label>
                <br/>
                <label> Selectionner votre type de carte : </label>
                <br/>
                <input type="radio" name="carte" value=1 checked="checked" id="visa" /> <label for="visa">Visa</label>
                <input type="radio" name="carte" value=0 id="mastercard" /> <label for="mastercard">Mastercard</label>
                <br> 
                <input type="text" name="nomcarte" size="40" placeholder="Nom Carte"/>
                <input type="text" name="prenomcarte" size="40" placeholder="Prenom Carte"/>
                 <br> 
                <input type="number" name="numcarte" size="20" placeholder="Numero de Carte"/>
                <input type="number" name="expiration" size="20" placeholder="Date expiration"/>
                <input type="number" name="cvv" size="20" placeholder="CVV"/>

                <input type="submit" value="Inscription" />
                
            </form>
        </div>
    </div>
</body>

</html>