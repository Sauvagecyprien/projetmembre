<head>
    <title>Le site d'inscription de cyprien</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->



</head>




<?php 
$servername = "localhost";
$username = "cyprien";
$password = "Brother97.4";
$dbname = "membres";
$pseudo = $_POST['pseudoconnection'];
$pass = $_POST['passconnection'];


$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//  Récupération de l'utilisateur et de son pass hashé
$req = $conn->prepare("SELECT id, pass FROM membre WHERE pseudo = '$pseudo'");
$req->execute();
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($pass, $resultat['pass']);

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
 ?>        
        <h1 style="text-align:center; font-size:4em"><strong><?php echo ''.$_SESSION['pseudo'].' est connecté!' ; ?></strong> </h1>
        <form action="commande.php">
<input type="submit" value="passer une commande"class="contact100-form-btn" style="width:250px; margin-top:5%; margin-left: 42.5%">
</form>

        <form action="deconnection.php">
<input type="submit" value="déconnection"class="contact100-form-btn" style="width:250px; margin-top:5%; margin-left: 42.5%">
</form>
<?php
        
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
        header('Location: connection2.html');

    }
}



$conn = null;

//
?>



