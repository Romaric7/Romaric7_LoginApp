<?php
$servername = "localhost";
$serverport = 5432;
$serverusername = "postgres";
$password = "admin";
$dbname = "HerokuLogin";

$username = $_POST['username'];
$email = $_POST['email'];
$account_password = $_POST['password'];
$phone_number = $_POST['number'];

$newpassword = md5($account_password);


// Create connection
$conn = pg_connect("host=".$servername." dbname=".$dbname." user=".$serverusername." password=".$password);

if (!$conn) {
    die("Connection failed: " . pg_connect_error());
}

$sql = "INSERT INTO account (username, email, account_password,phone_number)
VALUES ('$username', '$email', '$newpassword', '$phone_number')";


if (pg_query($conn, $sql)) {
    echo "<script>alert('SUCCES DE CREATION DE COMPTE.')</script>";
} else {
    echo "Error: " . $sql . "<br>" . pg_error($conn);
}

pg_close($conn);

?> 

       <!--redirection vers page de création de compte -->
        <script>

            window.open("index_account.php","_self");

        </script>
        



