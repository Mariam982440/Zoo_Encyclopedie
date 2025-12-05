<?php
require_once "db.php";

// Vérifier si l'ID est présent dans l'URL
if (!isset($_GET['id'])) {
    die("ID manquant !");
}

$id = intval($_GET['id']);

// Récupérer l'animal depuis la base
$sql = "SELECT * FROM animal WHERE id_anl = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    die("Animal introuvable.");
}

$animal = mysqli_fetch_assoc($result);

// Récupérer les habitats pour le menu déroulant
$habitatsResult = mysqli_query($conn, "SELECT * FROM habitat");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier animal</title>
</head>
<body>

<h2>Modifier l’animal : <?= htmlspecialchars($animal['nom_anl']) ?></h2>

<form action="trait_modifier.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $animal['id_anl'] ?>">

    <label>Nom :</label>
    <input type="text" name="nom" value="<?= htmlspecialchars($animal['nom_anl']) ?>" required>
    <br><br>

    <label>Type alimentaire :</label>
    <select name="type_al" required>
        <option value="Carnivore" <?= $animal['type_al'] == "Carnivore" ? "selected" : "" ?>>Carnivore</option>
        <option value="Herbivore" <?= $animal['type_al'] == "Herbivore" ? "selected" : "" ?>>Herbivore</option>
        <option value="Omnivore" <?= $animal['type_al'] == "Omnivore" ? "selected" : "" ?>>Omnivore</option>
    </select>
    <br><br>

    <label>Habitat :</label>
    <select name="habitat_id" required>
        <?php while ($hab = mysqli_fetch_assoc($habitatsResult)) : ?>
            <option value="<?= $hab['id_hab'] ?>" 
                <?= $hab['id_hab'] == $animal['habitat_id'] ? "selected" : "" ?>>
                <?= htmlspecialchars($hab['nom_hab']) ?>
            </option>
        <?php endwhile; ?>
    </select>
    <br><br>

    <p>Image actuelle :</p>
    <img src="../uploads/<?= $animal['img_anl'] ?>" width="150"><br><br>

    <label>Nouvelle image (facultatif) :</label>
    <input type="file" name="image">
    <br><br>

    <button type="submit">Enregistrer</button>
</form>

</body>
</html>
