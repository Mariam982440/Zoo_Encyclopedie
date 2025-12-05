<?php
require_once 'db.php';

// Vérifier si l'ID existe dans l'URL
if (!isset($_GET['id'])) {
    die("ID manquant.");
}

$id = intval($_GET['id']);

// 1️⃣ Récupérer le nom de l'image pour la supprimer du dossier
$sql_img = "SELECT img_anl FROM animal WHERE id_anl = $id";
$result = mysqli_query($conn, $sql_img);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Animal introuvable.");
}

$data = mysqli_fetch_assoc($result);
$imageName = $data['img_anl'];

// supprimer l'animal de la base de données
$sql_delete = "DELETE FROM animal WHERE id_anl = $id";
mysqli_query($conn, $sql_delete);

// supprimer l'image du dossier uploads
$imagePath = "../uploads/" . $imageName;

if (file_exists($imagePath)) {
    unlink($imagePath);  // supprime le fichier
}

// retourner à l'accueil
header("Location: ../index.php");
exit;