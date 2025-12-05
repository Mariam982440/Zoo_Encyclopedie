<?php
require_once "db.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Accès non autorisé.");
}

$id = intval($_POST['id']);
$nom = htmlspecialchars($_POST['nom']);
$type = htmlspecialchars($_POST['type_al']);
$habitat = intval($_POST['habitat_id']);

// Récupérer l'ancienne image
$oldImgQuery = mysqli_query($conn, "SELECT img_anl FROM animal WHERE id_anl = $id");
$oldImg = mysqli_fetch_assoc($oldImgQuery)['img_anl'];

$newImageName = $oldImg; // par défaut

// Si une nouvelle image est envoyée
if (!empty($_FILES['image']['name'])) {

    $tmp = $_FILES['image']['tmp_name'];
    $original = basename($_FILES['image']['name']);
    $newImageName = time() . "_" . $original;

    $uploadDir = "uploads/";

    move_uploaded_file($tmp, $uploadDir . $newImageName);

    // Supprimer l'ancienne image
    if (file_exists($uploadDir . $oldImg)) {
        unlink($uploadDir . $oldImg);
    }
}

// Mise à jour SQL
$sql = "UPDATE animal 
        SET nom_anl='$nom', type_al='$type', habitat_id=$habitat, img_anl='$newImageName'
        WHERE id_anl=$id";

mysqli_query($conn, $sql);

header("Location: ../index.php");
exit;
