<?php
include("../database/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Dashboard for FUT Champions, providing detailed statistics and management tools for players, clubs, and nationalities.">
    <meta name="author" content="Mouad Hallaffou">
    <meta name="project-name" content="FUT Champions Admin Dashboard">
    <!-- CSS Links -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Fut Champions</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../assets/images/logo.svg" alt="">
            </div>
            <span class="logo_name">FUT Ultimite</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="../index.php">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="link-name">Dashboard</span>
                    </a></li>
                <li><a href="players.php">
                        <i class="fas fa-users"></i>
                        <span class="link-name">Players</span>
                    </a></li>
                <li><a href="/FUT-Champions-Content-Manager/views/nationality.php">
                        <i class="fas fa-flag"></i>
                        <span class="link-name">Nationality</span>
                    </a></li>
                <li><a href="/FUT-Champions-Content-Manager/views/club.php">
                        <i class="fas fa-building"></i>
                        <span class="link-name">Club</span>
                    </a></li>
                <li><a href="#">
                        <i class="fas fa-building"></i>
                        <span class="link-name">Terrain</span>
                    </a></li>
                <li><a href="#">
                        <i class="fas fa-dumbbell"></i>
                        <span class="link-name">Statist JR</span>
                    </a></li>

                <li><a href="#">
                        <i class="fas fa-fist-raised"></i>
                        <span class="link-name">Statist GK</span>
                    </a></li>
            </ul>

            <ul class="logout-mode">
                <li><a href="#">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="link-name">Logout</span>
                    </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="fas fa-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>

                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="fas fa-bars sidebar-toggle"></i>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="boxes">
                    <div class="box box1">
                        <i class="fas fa-users"></i>
                        <span class="text">Total players</span>
                        <span class="number">23</span>
                    </div>
                    <div class="box box2">
                        <i class="fas fa-futbol"></i>
                        <span class="text">Terrain</span>
                        <span class="number">11</span>
                    </div>
                    <div class="box box3">
                        <i class="fas fa-exchange-alt"></i>
                        <span class="text">Changement</span>
                        <span class="number">12</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start block -->
        <section class="bg-gray-50 py-1 bg-gray-300 sm:rounded-lg antialiased">
            <div class="mx-auto max-w-screen-auto">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="flex-1 flex items-center space-x-2">
                            <h5>
                                <span class="text-gray-500">All Players:</span>
                                <span class="dark:text-white">0</span>
                            </h5>
                        </div>
                        <div class="flex-shrink-0 flex flex-col items-start md:flex-row md:items-center lg:justify-end space-y-3 md:space-y-0 md:space-x-3">
                            <button type="button" class="flex-shrink-0 inline-flex items-center justify-center py-2 px-3 text-xs font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                <i class="fas fa-cog mr-2 w-4 h-4"></i>
                                Table settings
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t dark:border-gray-700">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="fas fa-search w-5 h-5 text-gray-500 dark:text-gray-400"></i>
                                    </div>
                                    <input type="text" id="simple-search" placeholder="Search for products" required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                            </form>
                        </div>
                        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <button type="button" id="addPlayerButton" data-modal-toggle="createProductModal" class="flex items-center justify-center text-white bg-blue-800 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                <i class="fas fa-plus-circle h-3.5 w-3.5 mr-1.5 -ml-1"></i>
                                Add Player
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="p-4">Nom</th>
                                    <th scope="col" class="p-4">Nationalité</th>
                                    <th scope="col" class="p-4">Drapeau</th>
                                    <th scope="col" class="p-4">Club</th>
                                    <th scope="col" class="p-4">Logo</th>
                                    <th scope="col" class="p-4">Position</th>
                                    <th scope="col" class="p-4">Note</th>
                                    <th scope="col" class="p-4">Vitesse</th>
                                    <th scope="col" class="p-4">Tir</th>
                                    <th scope="col" class="p-4">Passes</th>
                                    <th scope="col" class="p-4">Dribbles</th>
                                    <th scope="col" class="p-4">Défense</th>
                                    <th scope="col" class="p-4">Physique</th>
                                    <th scope="col" class="p-4">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4 w-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-1" type="checkbox" onclick="event.stopPropagation()" class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center mr-3">
                                            <img src="https://cdn.sofifa.net/players/020/801/25_120.png" alt="Player Image" class="h-8 w-auto mr-3">
                                            Cristiano Ronaldo
                                        </div>
                                    </th>
                                    <td class="px-4 py-3">
                                        <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">Portugal</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <img src="https://cdn.sofifa.net/players/020/801/25_120.png" alt="Flag" class="h-4 w-4">
                                    </td>
                                    <td class="px-4 py-3">Al-Nassr</td>

                                    <td class="px-4 py-3">ST</td>
                                    <td class="px-4 py-3">95</td>
                                    <td class="px-4 py-3">90</td>
                                    <td class="px-4 py-3">89</td>
                                    <td class="px-4 py-3">85</td>
                                    <td class="px-4 py-3">88</td>
                                    <td class="px-4 py-3">60</td>
                                    <td class="px-4 py-3">75</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-4">
                                            <button type="button" class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                <i class="fas fa-edit mr-2"></i>
                                                Edit
                                            </button>
                                            <button type="button" class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                <i class="fas fa-trash mr-2"></i>
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    <!-- End block -->
    <form id="formulairePlayer" class="max-w-lg mx-auto mt-5 hidden">
        <h2 class="text-xl font-bold text-gray-900 mb-5 text-center">Ajouter un joueur</h2>

        <div class="grid grid-cols-2 gap-4 mb-5">
            <div>
                <label for="namePlayer" class="block text-sm font-medium text-gray-900">Nom du joueur :</label>
                <input type="text" id="namePlayer" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Entrez le nom du joueur" required>
                <span class="text-sm text-red-600 hidden">*Uniquement des caractères</span>
            </div>
            <div>
                <label for="photoPlayer" class="block text-sm font-medium text-gray-900">Photo du joueur :</label>
                <input type="url" id="photoPlayer" name="photo" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="URL de la photo" required>
                <span class="text-sm text-red-600 hidden">*L'URL doit commencer par "https://"</span>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-5">
            <div>
                <label for="nationalityPlayer" class="block text-sm font-medium text-gray-900">Nationalité :</label>
                <select id="nationalityPlayer" name="nationality" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5">
                    <option value="" selected>Choisir la nationalité</option>
                    <option value=" "> * * </option>
                </select>
            </div>
            <div>
                <label for="clubPlayer" class="block text-sm font-medium text-gray-900">Club :</label>
                <select id="clubPlayer" name="club" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5">
                    <option value="" selected>Choisir le club</option>
                    <option value=" "> * * </option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-5">
            <div>
                <label for="positionPlayer" class="block text-sm font-medium text-gray-900">Position :</label>
                <select id="positionPlayer" name="position" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5">
                    <option value="" selected>Choisir la position</option>
                    <option value="GK">GK</option>
                    <option value="CBL">CBL</option>
                    <option value="CBR">CBR</option>
                    <option value="LB">LB</option>
                    <option value="RB">RB</option>
                    <option value="CML">CML</option>
                    <option value="CMR">CMR</option>
                    <option value="CM">CM</option>
                    <option value="LW">LW</option>
                    <option value="RW">RW</option>
                    <option value="ST">ST</option>
                </select>
            </div>
            <div>
                <label for="ratingPlayers" class="block text-sm font-medium text-gray-900">Note globale :</label>
                <input type="number" id="ratingPlayers" name="rating" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Note (10-99)" required>
                <span class="text-sm text-red-600 hidden">*Comprise entre 10 et 99</span>
            </div>
        </div>

        <div id="statsPlayers" class="">
            <div class="grid grid-cols-2 gap-4 mb-5">
                <div>
                    <label for="pacePlayer" class="block text-sm font-medium text-gray-900">Vitesse :</label>
                    <input type="number" id="pacePlayer" name="pace" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Vitesse (10-99)">
                </div>
                <div>
                    <label for="shootingPlayer" class="block text-sm font-medium text-gray-900">Tir :</label>
                    <input type="number" id="shootingPlayer" name="shooting" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Tir (10-99)">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-5">
                <div>
                    <label for="passingPlayer" class="block text-sm font-medium text-gray-900">Passes :</label>
                    <input type="number" id="passingPlayer" name="passing" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Passes (10-99)">
                </div>
                <div>
                    <label for="dribblingPlayer" class="block text-sm font-medium text-gray-900">Dribbles :</label>
                    <input type="number" id="dribblingPlayer" name="dribbling" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Dribbles (10-99)">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-5">
                <div>
                    <label for="defendingPlayer" class="block text-sm font-medium text-gray-900">Défense :</label>
                    <input type="number" id="defendingPlayer" name="defending" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Défense (10-99)">
                </div>
                <div>
                    <label for="physicalPlayer" class="block text-sm font-medium text-gray-900">Physique :</label>
                    <input type="number" id="physicalPlayer" name="physical" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Physique (10-99)">
                </div>
            </div>
        </div>

        <div id="statsGK" class="hidden">
            <div class="grid grid-cols-2 gap-4 mb-5">
                <div>
                    <label for="divingGK" class="block text-sm font-medium text-gray-900">Plongée :</label>
                    <input type="number" id="divingGK" name="diving" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Plongée (10-99)">
                </div>
                <div>
                    <label for="handlingGK" class="block text-sm font-medium text-gray-900">Manipulation :</label>
                    <input type="number" id="handlingGK" name="handling" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Manipulation (10-99)">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-5">
                <div>
                    <label for="kickingGK" class="block text-sm font-medium text-gray-900">Dégagement :</label>
                    <input type="number" id="kickingGK" name="kicking" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Dégagement (10-99)">
                </div>
                <div>
                    <label for="reflexesGK" class="block text-sm font-medium text-gray-900">Réflexes :</label>
                    <input type="number" id="reflexesGK" name="reflexes" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Réflexes (10-99)">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-5">
                <div>
                    <label for="speedGK" class="block text-sm font-medium text-gray-900">Vitesse :</label>
                    <input type="number" id="speedGK" name="speed" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Vitesse (10-99)">
                </div>
                <div>
                    <label for="positioningGK" class="block text-sm font-medium text-gray-900">Positionnement :</label>
                    <input type="number" id="positioningGK" name="positioning" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Positionnement (10-99)">
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-700 text-white px-5 py-2 rounded-lg">Enregistrer</button>
        </div>
    </form>
    </section>
    <script>
  
    </script>
    <script src="../assets/js/main.js"></script>
</body>
</html>
