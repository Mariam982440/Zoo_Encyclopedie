<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Encyclopédie - Accueil</title>
    <!-- Import de Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Une police sympa pour les enfants (Google Fonts) -->
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Fredoka', sans-serif; }
    </style>
</head>
<body class="bg-green-50 text-gray-800">

    <!-- NAVIGATION -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-3xl">🦁</span>
                    <a href="index.php" class="ml-2 text-2xl font-bold text-green-700 tracking-wide">
                        Zoo Encyclopédie
                    </a>
                </div>
                
                <!-- Bouton Ajouter (Visible sur grand écran) -->
                <div class="hidden md:flex">
                    <button data-modal-target="default-modal" data-modal-toggle="default-modal">ajouter</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- HEADER / HERO SECTION -->
    <div class="text-center py-12 bg-green-600 text-white rounded-b-3xl shadow-md mb-10">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Bienvenue, petit explorateur ! 🌿</h1>
        <p class="text-xl opacity-90">Découvre les animaux fantastiques de notre zoo.</p>
        
        <!-- Filtres rapides (Optionnel pour plus tard) -->
        <div class="mt-8 flex justify-center gap-3 flex-wrap">
            <button class="bg-white/20 hover:bg-white/30 px-4 py-2 rounded-full backdrop-blur-sm transition">🌍 Savane</button>
            <button class="bg-white/20 hover:bg-white/30 px-4 py-2 rounded-full backdrop-blur-sm transition">🌴 Jungle</button>
            <button class="bg-white/20 hover:bg-white/30 px-4 py-2 rounded-full backdrop-blur-sm transition">🌊 Océan</button>
        </div>
    </div>

    <!-- CONTENU PRINCIPAL -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        
        <!-- Titre de section -->
        <div class="flex justify-between items-end mb-6">
            <h2 class="text-2xl font-bold text-green-800 border-l-4 border-yellow-400 pl-3">
                Nos Animaux
            </h2>
            <!-- Bouton Ajouter (Visible sur mobile) -->
            <a href="ajouter_animal.php" class="md:hidden text-green-600 font-bold hover:underline">+ Ajouter</a>
        </div>

        <!-- GRILLE DES ANIMAUX -->
        <!-- C'est ici que la boucle PHP viendra plus tard -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- CARTE EXEMPLE 1 (Statique pour le moment) -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-1 group">
                <!-- Image -->
                <div class="relative h-56 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1546182990-dffeafbe841d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                         alt="Lion" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <!-- Badge Habitat -->
                    <span class="absolute top-3 right-3 bg-yellow-400 text-yellow-900 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">
                        Savane
                    </span>
                </div>
                
                <!-- Contenu -->
                <div class="p-6">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-2xl font-bold text-gray-800">Lion</h3>
                        <!-- Badge Régime -->
                        <span class="text-red-500 bg-red-50 px-2 py-1 rounded text-sm font-semibold flex items-center gap-1">
                            🍖 Carnivore
                        </span>
                    </div>
                    
                    <p class="text-gray-500 text-sm mb-4">Le roi de la jungle, majestueux et puissant.</p>

                    <!-- Boutons d'action -->
                    <div class="flex gap-2 mt-4 pt-4 border-t border-gray-100">
                        <a href="modifier.php?id=1" class="flex-1 bg-blue-50 text-blue-600 py-2 rounded-lg text-center font-semibold hover:bg-blue-100 transition">
                            ✏️ Modifier
                        </a>
                        <a href="supprimer.php?id=1" onclick="return confirm('Êtes-vous sûr ?')" class="flex-1 bg-red-50 text-red-600 py-2 rounded-lg text-center font-semibold hover:bg-red-100 transition">
                            🗑️ Supprimer
                        </a>
                    </div>
                </div>
            </div>

            <!-- CARTE EXEMPLE 2 -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-1 group">
                <div class="relative h-56 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1504208434309-cb69f4fe52b0?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                         alt="Zèbre" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <span class="absolute top-3 right-3 bg-yellow-400 text-yellow-900 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">
                        Savane
                    </span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-2xl font-bold text-gray-800">Zèbre</h3>
                        <span class="text-green-600 bg-green-50 px-2 py-1 rounded text-sm font-semibold flex items-center gap-1">
                            🍃 Herbivore
                        </span>
                    </div>
                    <p class="text-gray-500 text-sm mb-4">Connu pour ses rayures noires et blanches uniques.</p>
                    <div class="flex gap-2 mt-4 pt-4 border-t border-gray-100">
                        <a href="#" class="flex-1 bg-blue-50 text-blue-600 py-2 rounded-lg text-center font-semibold hover:bg-blue-100 transition">✏️ Modifier</a>
                        <a href="#" class="flex-1 bg-red-50 text-red-600 py-2 rounded-lg text-center font-semibold hover:bg-red-100 transition">🗑️ Supprimer</a>
                    </div>
                </div>
            </div>

            

        </div>
    </main>
    

    

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm bg-gray-900/50">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        
        <!-- Modal content -->
        <div class="relative bg-white border border-gray-200 rounded-xl shadow-2xl p-4 md:p-6">
            
            <!-- Modal header -->
            <div class="flex items-center justify-between border-b border-gray-200 pb-4 md:pb-5">
                <h3 class="text-xl font-bold text-gray-900">
                    🦁 Ajouter un nouvel animal
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm w-9 h-9 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>
                    <span class="sr-only">Fermer</span>
                </button>
            </div>

            <!-- DÉBUT DU FORMULAIRE -->
            <!-- L'attribut enctype est OBLIGATOIRE pour envoyer des images -->
            <form action="traitement_ajout.php" method="POST" enctype="multipart/form-data">
                
                <!-- Modal body -->
                <div class="grid gap-4 mb-4 grid-cols-2 mt-4">
                    
                    <!-- 1. Nom de l'animal -->
                    <div class="col-span-2">
                        <label for="nom" class="block mb-2 text-sm font-medium text-gray-900">Nom de l'animal</label>
                        <input type="text" name="nom" id="nom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="Ex: Lion, Zèbre..." required="">
                    </div>

                    <!-- 2. Type d'alimentation (Select) -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="diet" class="block mb-2 text-sm font-medium text-gray-900">Régime Alimentaire</label>
                        <select id="diet" name="type_alimentaire" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            <option value="" selected disabled>Choisir...</option>
                            <!-- Les valeurs correspondent à l'ENUM de la base de données -->
                            <option value="Carnivore">🍖 Carnivore</option>
                            <option value="Herbivore">🥗 Herbivore</option>
                            <option value="Omnivore">🍔 Omnivore</option>
                        </select>
                    </div>

                    <!-- 3. Habitat (Select) -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="habitat" class="block mb-2 text-sm font-medium text-gray-900">Habitat</label>
                        <select id="habitat" name="habitat_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            <option value="" selected disabled>Choisir un lieu...</option>
                            <!-- Les valeurs (1, 2...) sont les ID de la table Habitat -->
                            <option value="1">🌍 Savane</option>
                            <option value="2">🌴 Jungle</option>
                            <option value="3">🌵 Désert</option>
                            <option value="4">🌊 Océan</option>
                        </select>
                    </div>

                    <!-- 4. Image (Input File) -->
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Photo de l'animal</label>
                        <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="file_input" type="file" accept="image/*" required>
                        <p class="mt-1 text-sm text-gray-500" id="file_input_help">PNG, JPG ou JPEG (MAX. 2MB).</p>
                    </div>

                </div>

                <!-- Modal footer -->
                <div class="flex items-center border-t border-gray-200 pt-4 md:pt-5 space-x-4">
                    <!-- Bouton Submit -->
                    <button type="submit" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        + Ajouter l'animal
                    </button>
                    <!-- Bouton Annuler -->
                    <button data-modal-hide="default-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                        Annuler
                    </button>
                </div>
            
            </form>
            <!-- FIN DU FORMULAIRE -->

        </div>
    </div>
</div>





    <!-- FOOTER -->
    <footer class="bg-green-800 text-white py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2025 Zoo Encyclopédie. Fait avec ❤️ pour les enfants.</p>
        </div>
    </footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>
</html>