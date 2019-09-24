<?php 
$servername = "localhost";
$username = "cyprien";
$password = "Brother97.4";
$dbname = "membres";
$id = $_POST['id_articles'];


echo $_SESSION['id'] = $resultat['id'];
echo $_SESSION['pseudo'] = $pseudo;
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insertion
    $sql = "INSERT INTO commande (id, id_client, id_objet, date_commande)
    VALUES (null, '$resultat['id']', '$id', CURDATE())";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
    
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

//header('Location: connection.html');
?>
