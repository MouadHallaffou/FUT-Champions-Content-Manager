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
                            <button type="button" id="createProductButton" data-modal-toggle="createProductModal" class="flex items-center justify-center text-white bg-blue-800 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
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
                                    <th scope="col" class="p-4">id</th>
                                    <th scope="col" class="p-4">Club</th>
                                    <th scope="col" class="p-4">Logo</th>
                                    <th scope="col" class="p-4">Actions</th>
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
                                    <td class="px-4 py-3">1</td>
                                    <td class="px-4 py-3">real madrid</td>
                                    <td class="px-4 py-3">
                                        <img src="https://cdn.sofifa.net/players/020/801/25_120.png" alt="Club Logo" class="h-4 w-4">
                                    </td>
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
    </section>

    <script src="assets/js/script.js"></script>
</body>
</html>