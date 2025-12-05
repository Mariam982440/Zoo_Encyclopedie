<?php
require_once __DIR__ . '/php/db.php';

// Charger TOUS les animaux sans filtre
$sql = "SELECT animal.*, habitat.nom_hab 
        FROM animal
        LEFT JOIN habitat ON animal.habitat_id = habitat.id_hab";

$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Encyclopédie - Accueil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Fredoka', sans-serif; }
    </style>
</head>

<body class="bg-green-50 text-gray-800">

<!-- NAVIGATION -->
<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 flex justify-between h-16 items-center">
        <div class="flex items-center">
            <span class="text-3xl">🦁</span>
            <a href="index.php" class="ml-2 text-2xl font-bold text-green-700">
                Zoo Encyclopédie
            </a>
        </div>

        <div class="hidden md:flex">
            <button data-modal-target="default-modal" data-modal-toggle="default-modal" 
                    class="text-green-700 font-semibold">
                + Ajouter
            </button>
        </div>
    </div>
</nav>

<!-- HERO -->
<header class="text-center py-12 bg-green-600 text-white rounded-b-3xl shadow-md mb-10">
    <h1 class="text-4xl md:text-5xl font-bold mb-4">Bienvenue, petit explorateur ! 🌿</h1>
    <p class="text-xl opacity-90">Découvre les animaux fantastiques de notre zoo.</p>
</header>

<!-- CONTENU PRINCIPAL -->
<main class="max-w-7xl mx-auto px-4 pb-12">

    <div class="flex justify-between items-end mb-6">
        <h2 class="text-2xl font-bold text-green-800 border-l-4 border-yellow-400 pl-3">
            Nos Animaux
        </h2>

        <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                class="md:hidden text-green-600 font-bold">
            + Ajouter
        </button>
    </div>

    <!-- GRILLE ANIMAUX -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

<?php

if (!$result) {
    echo "<p class='col-span-3 text-red-600'>Erreur base de données : " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} else {
    if (mysqli_num_rows($result) === 0) {
        echo "<p class='col-span-3 text-gray-500'>Aucun animal trouvé.</p>";
    } else {
        while ($animal = mysqli_fetch_assoc($result)) :

            $diet = $animal['type_al'] ?? '';
            switch ($diet) {
                case 'Carnivore':
                    $dietColor = 'bg-red-50 text-red-600';
                    break;
                case 'Herbivore':
                    $dietColor = 'bg-green-50 text-green-600';
                    break;
                case 'Omnivore':
                    $dietColor = 'bg-orange-50 text-orange-600';
                    break;
                default:
                    $dietColor = 'bg-gray-100 text-gray-800';
            }

            $nom_anl  = htmlspecialchars($animal['nom_anl'] ?? '—');
            $type_al  = htmlspecialchars($animal['type_al'] ?? '—');
            $nom_hab  = htmlspecialchars($animal['nom_hab'] ?? 'Inconnu');
            $img      = htmlspecialchars($animal['img_anl'] ?? '');
            $id_anl   = intval($animal['id_anl'] ?? 0);

            $img_path = $img !== '' ? 'uploads/' . $img : 'https://via.placeholder.com/800x450?text=Pas+d+image';

?>
    <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition group">
        <div class="relative h-56 overflow-hidden">
            <img src="<?= $img_path ?>"
                 alt="<?= $nom_anl ?>"
                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500">

            <span class="absolute top-3 right-3 bg-yellow-400 text-yellow-900 text-xs font-bold px-3 py-1 rounded-full uppercase">
                <?= $nom_hab ?>
            </span>
        </div>

        <div class="p-6">
            <div class="flex justify-between items-center mb-2">
                <h3 class="text-2xl font-bold text-gray-800"><?= $nom_anl ?></h3>

                <span class="<?= $dietColor ?> px-2 py-1 rounded text-sm font-semibold">
                    <?= $type_al ?>
                </span>
            </div>

            <div class="flex gap-2 mt-4 pt-4 border-t border-gray-100">
                <a href="php/modifier.php?id=<?= $id_anl ?>"
                   class="flex-1 bg-blue-50 text-blue-600 py-2 rounded-lg text-center font-bold hover:bg-blue-100">
                    ✏️
                </a>

                <a href="php/supprimer.php?id=<?= $id_anl ?>"
                   onclick="return confirm('Êtes-vous sûr ?')"
                   class="flex-1 bg-red-50 text-red-600 py-2 rounded-lg text-center font-bold hover:bg-red-100">
                    🗑️
                </a>
            </div>
        </div>
    </div>

<?php
        endwhile;
    }
}
?>
</div>


</main>

<!-- MODAL AJOUT -->
<!-- (Tu peux laisser cette partie, elle n'a pas changement) -->

<footer class="bg-green-800 text-white py-6 mt-12">
    <div class="text-center">
        &copy; 2025 Zoo Encyclopédie. Fait avec ❤️ pour les enfants.
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>
</html>
