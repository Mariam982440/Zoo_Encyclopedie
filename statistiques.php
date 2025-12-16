<?php
// Connexion à la base de données
require_once __DIR__ . '/php/db.php';

// récupérer le nombre TOTAL d'animaux
$resTotal = mysqli_query($conn, "SELECT COUNT(*) as total FROM animal");
$totalAnimaux = mysqli_fetch_assoc($resTotal)['total'];

// eviter la division par zéro si la base est vide
if ($totalAnimaux == 0) $totalAnimaux = 1;

// 2 récupérer les comptes par RÉGIME
$sqlDiet = "SELECT type_al, COUNT(*) as nombre FROM animal GROUP BY type_al";
$resDiet = mysqli_query($conn, $sqlDiet);

// 3 récupérer les comptes par HABITAT
$sqlHab = "SELECT h.nom_hab, COUNT(a.id_anl) as nombre 
           FROM habitat h 
           LEFT JOIN animal a ON h.id_hab = a.habitat_id 
           GROUP BY h.id_hab";
$resHab = mysqli_query($conn, $sqlHab);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Statistiques Simples</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">
    <style>body { font-family: 'Fredoka', sans-serif; }</style>
</head>
<body class="bg-green-50 text-gray-800 p-6">

    <div class="max-w-4xl mx-auto">
        
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-green-800">📊 Statistiques du Zoo</h1>
            <a href="index.php" class="bg-white border border-green-600 text-green-600 px-4 py-2 rounded-lg hover:bg-green-50">
                ⬅ Retour
            </a>
        </div>

        <!-- Gros Chiffre Total -->
        <div class="bg-white p-6 rounded-xl shadow-md text-center mb-8 border-t-4 border-blue-500">
            <h2 class="text-gray-500 font-bold uppercase">Population Totale</h2>
            <p class="text-6xl font-bold text-blue-600 mt-2"><?= $totalAnimaux ?></p>
            <p class="text-gray-400">animaux heureux</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-xl font-bold mb-4 border-b pb-2">🥗 Par Alimentation</h3>
                
                <div class="space-y-4">
                    <?php while($row = mysqli_fetch_assoc($resDiet)): 
                        // Calcul du pourcentage : (nombre / total) * 100
                        $pourcentage = round(($row['nombre'] / $totalAnimaux) * 100);
                        
                        // Couleur selon le type
                        $colorClass = match($row['type_al']) {
                            'Carnivore' => 'bg-red-500',
                            'Herbivore' => 'bg-green-500',
                            'Omnivore' => 'bg-orange-400',
                            default => 'bg-gray-400'
                        };
                    ?>
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="font-bold"><?= $row['type_al'] ?></span>
                            <span class="text-gray-600"><?= $row['nombre'] ?> animaux (<?= $pourcentage ?>%)</span>
                        </div>
                        <!-- La barre visuelle -->
                        <div class="w-full bg-gray-200 rounded-full h-4">
                            <div class="<?= $colorClass ?> h-4 rounded-full" style="width: <?= $pourcentage ?>%"></div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-xl font-bold mb-4 border-b pb-2">🏡 Par Habitat</h3>
                
                <ul class="space-y-3">
                    <?php while($row = mysqli_fetch_assoc($resHab)): ?>
                    <li class="flex justify-between items-center p-3 bg-gray-50 rounded-lg hover:bg-green-50 transition">
                        <span class="text-lg">
                            <?php 
                            // Petite icône selon le nom
                            echo match($row['nom_hab']) {
                                'Savane' => '🌍', 
                                'Jungle' => '🌴', 
                                'Désert' => '🌵', 
                                'Océan' => '🌊', 
                                default => '📍'
                            }; 
                            ?>
                            <?= $row['nom_hab'] ?>
                        </span>
                        <span class="bg-green-200 text-green-800 font-bold px-3 py-1 rounded-full text-sm">
                            <?= $row['nombre'] ?>
                        </span>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>

        </div>
    </div>

</body>
</html>