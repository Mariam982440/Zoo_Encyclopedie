<?php
$conn = mysqli_connect("localhost", "root", "", "zoo_encyclopedie");

if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}
?>