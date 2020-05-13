<?php
$servername = "ec2-52-201-55-4.compute-1.amazonaws.com";
$serverport = 5432;
$serverusername = "hjdydbqfddtsxg";
$password = "aeb31b161763d44c95f3e05a3cb8e3e15e4505ff4f707a2dd9cf39df415cff37";
$dbname = "d1gkedto5umd53";

$username = $_POST['username'];
$account_password = $_POST['password'];

$newpassword = md5($account_password);



// Create connection
$conn = pg_connect("host=".$servername." dbname=".$dbname." user=".$serverusername." password=".$password);

//echo "host=".$servername." dbname=".$dbname." user=".$username." password=".$password;

if (!$conn) {
    die("Connection failed: " . pg_connect_error());
}

$sql = "SELECT * FROM account WHERE username = '$username' AND account_password= '$newpassword'";
$result = pg_query($conn, $sql);

if (pg_num_rows($result) > 0) {
    //selection des data de chaque ligne/tuple/enregistrement 
    while($row = pg_fetch_assoc($result)) {
        echo "<script>alert('Connexion effectuée avec succès')</script>";
    }
} else  { ?>

    <script>alert("Echec de connexion, nom d'utilisateur ou mot de passe incorrect")</script>

    <?php
}


pg_close($conn);

?>

 <!--redirection vers page de login -->
 <script>

window.open("index.php","_self");

</script>