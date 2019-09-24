<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>commande</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="" href="Pokemon-Classic.ttf">
<link rel="stylesheet" href="css\style.css">
</head>
<body>

<h1 style="text-align:center; font-size: 5em; font-family: policecypi"><strong> la boutique de cypi </strong></h1>
<h1><br><br> voici les articles que nous vous proposons, ce sont des articles pour lancer des marques amateurs, <br>qualité certifié par nos equipes </h1>


<div class='row' style="margin-top: 4%">

<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=membres;charset=utf8', 'cyprien', 'Brother97.4');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table utilisateur
$reponse = $bdd->query('SELECT * FROM articles');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
<form action="transfertcommande-myadmin.php">
    <div class="card" style="width: 18rem; margin-left:15px; margin-bottom:15px; text-align:center">
    <img src="<?php echo $donnees['urlimage']; ?>" class="card-img-top" style="height:70%">
        <div class="card-body">
            <h5 class="card-title"><strong> <?php echo $donnees['nom_articles']; ?>,</strong></h5>
            <p class="card-text"> prix : <?php echo $donnees['prix_articles']; ?>$</p>
            <button type="submit" name="submit" class="btn btn-secondary"  id="<?php echo $donnees['id_articles']; ?>"> commander</button>
        </div>
    </div>
</form>
   
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
</div>
</body>
</html>