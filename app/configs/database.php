<?php 
$host = "mysql:host=localhost:3306;dbname=lansurong";
$username = "root";
$pass = "Tnc2024@";
try {
    $conn = new PDO($host, $username, $pass);
    $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
} catch (PDOException $ex) {
    echo "connection failed: ".$ex->getMessage();
}
?>