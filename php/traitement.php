<?php
session_start();

// Connexion MySQLi
require_once 'db.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $type_al = $_POST['type_alimentaire'];
    $habitat_id = intval($_POST['habitat_id']);

    // Vérifier l'image
    if (!empty($_FILES['image']['name'])) {

        $tmpFile = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);

        // Dossier des uploads (remonte d'un dossier si nécessaire)
        $uploadDir = "../uploads/";

        // Nouveau nom unique
        $imageNewName = time() . "_" . $imageName;

        // Si le dossier n'existe pas, le créer
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Déplacer l'image
        if (move_uploaded_file($tmpFile, $uploadDir . $imageNewName)) {

            // Requête SQL simple
            $sql = "INSERT INTO animal (nom_anl, type_al, img_anl, habitat_id)
                    VALUES ('$nom', '$type_al', '$imageNewName', '$habitat_id')";

            if (mysqli_query($conn, $sql)) {
                $_SESSION['message'] = " Animal ajouté avec succès !";
                header("Location: ../index.php");
                exit;
            } else {
                echo " Erreur SQL : " . mysqli_error($conn);
            }

        } else {
            echo " Erreur : impossible d’enregistrer l’image.";
        }

    } else {
        echo " Aucune image sélectionnée.";
    }

} else {
    echo " Formulaire non soumis.";
}
?>
