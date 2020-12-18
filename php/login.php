<?php



// On vérifie que tous les champs sont remplis
if(isset($_POST['pseudo'])){
// On récupère les valeurs saisies
$pseudo= strip_tags($_POST['pseudo']);
$pass = $_POST['password'];

// On vérifie si l'email existe dans la base de données
// On se connecte à la base
require_once('bdd.php');

// On écrit la requête
$sql = 'SELECT * FROM `user` WHERE `pseudo` = :pseudo';

// On prépare la requête
$query = $db->prepare($sql);

// On injecte les valeurs
$query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

// On exécute la requête
$query->execute();

// On récupère les données
$user = $query->fetch(PDO::FETCH_ASSOC);

// Soit on a une réponse dans $user, soit non
// On vérifie si on a une réponse
if(!$user){
echo 'Pseudo invalide';
}else{
// On vérifie que le mot de passe saisi correspond à celui en base
if($pass == $user['password']){
// On crée la session "user"
// On ne stocke JAMAIS de données dont on ne maîtrise pas le contenu
$_SESSION['user'] = $user['pseudo'];
$_SESSION['id'] = $user['id'];

header('Location: php/chat.php');
}else{
echo 'Email et/ou mot de passe invalide';
}
}

}else{
echo "Veuillez remplir tous les champs...";
}

?>
<?php
include("header.php");
?>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <h3>Connexion<h3>
        </div>

        <!-- Login Form -->
        <div class="row">
            <div class="col-12">
                <form method="POST">
                    <input type="text" id="login" class="fadeIn second" name="pseudo" placeholder="Pseudo">
                    <input type="password" id="password" class="fadeIn third" name="password" placeholder="Mot de passe">
                    <input type="submit" class="fadeIn fourth" value="Connexion">
                </form>
            </div>
        </div>
    </div>
</div>

