<?php 
/*
try
{
   
$bdd = new PDO('mysql:host=localhost;dbname=membres;charset=utf8', 'cyprien', 'Brother97.4');	
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM membre');

$pseudo = $_POST['pseudo'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$repass = $_POST['retapermdp'];


if($pass == $repass)
{
// Hachage du mot de passe
$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
// Insertion
$req = $bdd->exec('INSERT INTO membre(id, pseudo, pass, email, date_inscription) VALUES(null,"'.$pseudo.'","'.$pass.'","'.$email.'", CURDATE())');

$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass_hache,
    'email' => $email));
echo'vous avez reussi';
}

else
{
   echo 'mots de passes pas identiques';
  
}

 header('Location: index.php');

 $conn = null;
 */
    ?>


<?php 
$servername = "localhost";
$username = "cyprien";
$password = "Brother97.4";
$dbname = "membres";
$pseudo = $_POST['pseudo'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$repass = $_POST['retapermdp'];


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($pass == $repass)
    {
    // Hachage du mot de passe
    $pass_hache = password_hash($pass, PASSWORD_DEFAULT);
    // Insertion
    $sql = "INSERT INTO membre (id, pseudo, pass, email, date_inscription)
    VALUES (null, '$pseudo', '$pass_hache', '$email', CURDATE())";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    
}

else
{
   echo 'mots de passes pas identiques';
  
}}
    
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

header('Location: connection.html');
?>
