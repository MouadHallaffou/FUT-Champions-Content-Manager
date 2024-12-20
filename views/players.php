<?php
include("../database/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name_player = isset($_POST['name_player']) ? trim($_POST['name_player']) : '';
    $photo_player = isset($_POST['photo_player']) ? trim($_POST['photo_player']) : '';
    $nationality_player = isset($_POST['nationality_player']) ? trim($_POST['nationality_player']) : '';
    $club_player = isset($_POST['club_player']) ? trim($_POST['club_player']) : '';
    $position_player = isset($_POST['position_player']) ? trim($_POST['position_player']) : '';
    $rating_player = isset($_POST['rating_player']) ? trim($_POST['rating_player']) : '';
    $pace_player = isset($_POST['pace_player']) ? trim($_POST['pace_player']) : '';
    $shooting_player = isset($_POST['shooting_player']) ? trim($_POST['shooting_player']) : '';
    $passing_player = isset($_POST['passing_player']) ? trim($_POST['passing_player']) : '';
    $dribbling_player = isset($_POST['dribbling_player']) ? trim($_POST['dribbling_player']) : '';
    $defending_player = isset($_POST['defending_player']) ? trim($_POST['defending_player']) : '';
    $physical_player = isset($_POST['physical_player']) ? trim($_POST['physical_player']) : '';

    if (!empty($name_player) && !empty($photo_player) && !empty($nationality_player) && !empty($club_player) 
        && !empty($position_player) && !empty($rating_player) && !empty($pace_player) 
        && !empty($shooting_player) && !empty($passing_player) && !empty($dribbling_player) 
        && !empty($defending_player) && !empty($physical_player)) {

        $stmtStats = $connection->prepare("INSERT INTO StatistiqueJrs (pace, shooting, passing, dribbling, defending, physical) VALUES (?, ?, ?, ?, ?, ?)");
        $stmtStats->bind_param('iiiiii', $pace_player, $shooting_player, $passing_player, $dribbling_player, $defending_player, $physical_player);
        $stmtStats->execute();
        $statistjr_id = $connection->insert_id;

        $stmt = $connection->prepare("INSERT INTO Players (name_player, photo, nationality_id, club_id, position, rating, statistjr_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        $stmtNat = $connection->prepare("SELECT nationality_id FROM Nationalities WHERE nationality_name = ?");
        $stmtNat->bind_param('s', $nationality_player);
        $stmtNat->execute();
        $resultNat = $stmtNat->get_result();
        $nationality_id = $resultNat->fetch_assoc()['nationality_id'];

        $stmtClub = $connection->prepare("SELECT club_id FROM Clubs WHERE club_name = ?");
        $stmtClub->bind_param('s', $club_player);
        $stmtClub->execute();
        $resultClub = $stmtClub->get_result();
        $club_id = $resultClub->fetch_assoc()['club_id'];

        $stmt->bind_param('ssssssi', $name_player, $photo_player, $nationality_id, $club_id, $position_player, $rating_player, $statistjr_id);

        if ($stmt->execute()) {
            header('Location: players.php?success=1');
            exit();
        } else {
            echo "<script>alert('Erreur lors de l\'insertion du joueur : " . addslashes($stmt->error) . "');</script>";
        }
        $stmt->close();
        $stmtStats->close();
        $stmtNat->close();
        $stmtClub->close();
    }
}

$sqlnat = "SELECT nationality_name FROM Nationalities"; 
$resultnat = $connection->query($sqlnat);
$nationalities = [];
if ($resultnat->num_rows > 0) { 
    while ($row = $resultnat->fetch_assoc()) {
        $nationalities[] = $row['nationality_name']; 
    }
}

$sqlclub = "SELECT club_name FROM Clubs"; 
$resultclub = $connection->query($sqlclub);
$clubs = [];
if ($resultclub->num_rows > 0) {
    while ($row = $resultclub->fetch_assoc()) {
        $clubs[] = $row['club_name']; 
    }
}

// Fetch players et les statistics
$sql = "SELECT p.player_id, p.name_player, p.photo, n.nationality_name, n.flag, c.club_name,
               c.logo, p.position, p.rating, s.pace, s.shooting, s.passing, 
               s.dribbling, s.defending, s.physical
        FROM Players p
        JOIN Nationalities n ON p.nationality_id = n.nationality_id
        JOIN Clubs c ON p.club_id = c.club_id
        JOIN StatistiqueJrs s ON p.statistjr_id = s.statistjr_id;";
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

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
                        <span class="number"><?= $connection->query("SELECT COUNT(*) FROM Players")->fetch_row()[0]; ?></span>
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

            <!-- Start block -->
            <section class="bg-gray-50 py-1 px-1 bg-gray-300 sm:rounded-lg antialiased">
                <div class="mx-auto max-w-screen-auto">
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                            <div class="flex-1 flex items-center space-x-2">
                                <h5>
                                    <span class="text-gray-500">All Players:</span>
                                    <span class="dark:text-white"><?= $connection->query("SELECT COUNT(*) FROM Players")->fetch_row()[0]; ?></span>
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
                                        <input type="text" id="simple-search" placeholder="Search for players" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                </form>
                            </div>
                            <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                <button type="button" id="addPlayerButton" class="flex items-center justify-center text-white bg-blue-800 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                    <i class="fas fa-plus-circle h-3.5 w-3.5 mr-1.5 -ml-1"></i>
                                    Add Player
                                </button>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="p-4">ID</th>
                                        <th scope="col" class="p-4">Nom</th>
                                        <th scope="col" class="p-4">Profil</th>
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
                            <?php 
                            if ($result = $connection->query($sql)){
                                if ($result->num_rows > 0){
                                    while ($row = $result->fetch_assoc()) : ?>
                                        <tr>
                                            <td class="px-4 py-3"><?= htmlspecialchars($row["player_id"]) ?></td>
                                            <td class="px-4 py-3"><?= htmlspecialchars($row["name_player"]) ?></td>
                                            <td class="px-4 py-3"><img src="<?= htmlspecialchars($row["photo"]) ?>" alt="Profile" class="h-8 w-8"></td>
                                            <td class="px-4 py-3"><?= htmlspecialchars($row["nationality_name"]) ?></td>
                                            <td class="px-4 py-3"><img src="<?= htmlspecialchars($row["flag"]) ?>" alt="Flag" class="h-6 w-8"></td>
                                            <td class="px-4 py-3"><?= htmlspecialchars($row["club_name"]) ?></td>
                                            <td class="px-4 py-3"><img src="<?= htmlspecialchars($row["logo"]) ?>" alt="Logo" class="h-8 w-8"></td>
                                            <td class="px-4 py-3"><?= htmlspecialchars($row["position"]) ?></td> 
                                            <td class="px-4 py-3"><?= htmlspecialchars($row["rating"]) ?></td>
                                            <td class="px-4 py-3"><?= htmlspecialchars($row["pace"]) ?></td>
                                            <td class="px-4 py-3"><?= htmlspecialchars($row["shooting"]) ?></td>
                                            <td class="px-4 py-3"><?= htmlspecialchars($row["passing"]) ?></td>
                                            <td class="px-4 py-3"><?= htmlspecialchars($row["dribbling"]) ?></td>
                                            <td class="px-4 py-3"><?= htmlspecialchars($row["defending"]) ?></td>
                                            <td class="px-4 py-3"><?= htmlspecialchars($row["physical"]) ?></td>
                                            <td class="px-4 py-3 flex space-x-2">
                                                <a href="editPlayers.php?id=<?=$row['player_id'] ?>" class="py-2 px-3 flex items-center text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-900">
                                                    <i class="fas fa-edit mr-2"></i>
                                                    Edit
                                                </a>
                                                <a href="deletePlayers.php?id=<?= $row['player_id'] ?>" class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                    <i class="fas fa-trash mr-2"></i>
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endwhile; 
                                } else {
                                    echo "<tr><td colspan='16'>No players found.</td></tr>";
                                }
                            } else {
                                echo "Error dans SQl querys: " . $connection->error;
                            }
                            ?>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </section>
            <!-- End block -->
            
        <form id="formulairePlayer" class="hidden fixed inset-0 z-50 bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto border border-gray-300 max-h-[72vh] overflow-y-auto" method="POST" action="">
             <h2 class="text-xl font-bold text-gray-900 mb-5 text-center">Ajouter un joueur</h2>

                <div class="grid grid-cols-2 gap-4 mb-5">
                    <div>
                        <label for="namePlayer" class="block text-sm font-medium text-gray-900">Nom du joueur :</label>
                        <input type="text" id="namePlayer" name="name_player" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Entrez le nom du joueur" required>
                        <span class="text-sm text-red-600 hidden">*Uniquement des caractères</span>
                    </div>
                    <div>
                        <label for="photoPlayer" class="block text-sm font-medium text-gray-900">Photo du joueur :</label>
                        <input type="url" id="photoPlayer" name="photo_player" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="URL de la photo" required>
                        <span class="text-sm text-red-600 hidden">*L'URL doit commencer par "https://"</span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-5">
                    <div>
                        <label for="nationalityPlayer" class="block text-sm font-medium text-gray-900">Nationalité:</label>
                        <select id="nationalityPlayer" name="nationality_player" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5">
                            <option value="" selected>Choisir la nationalité</option>
                            <?php foreach ($nationalities as $nationality): ?>
                            <option value="<?= htmlspecialchars($nationality) ?>"><?= htmlspecialchars($nationality) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label for="clubPlayer" class="block text-sm font-medium text-gray-900">Club:</label>
                        <select id="clubPlayer" name="club_player" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5">
                            <option value="" selected>Choisir le club</option>
                            <?php foreach ($clubs as $club): ?>
                            <option value="<?= htmlspecialchars($club) ?>"><?= htmlspecialchars($club) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-5">
                    <div>
                        <label for="positionPlayer" class="block text-sm font-medium text-gray-900">Position:</label>
                        <select id="positionPlayer" name="position_player" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5">
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
                        <input type="number" id="ratingPlayers" name="rating_player" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Note (10-99)" required>
                        <span class="text-sm text-red-600 hidden">*Comprise entre 10 et 99</span>
                    </div>
                </div>

                <div id="statsPlayers" class="">
                    <div class="grid grid-cols-2 gap-4 mb-5">
                        <div>
                            <label for="pacePlayer" class="block text-sm font-medium text-gray-900">Vitesse :</label>
                            <input type="number" id="pacePlayer" name="pace_player" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Vitesse (10-99)">
                        </div>
                        <div>
                            <label for="shootingPlayer" class="block text-sm font-medium text-gray-900">Tir :</label>
                            <input type="number" id="shootingPlayer" name="shooting_player" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Tir (10-99)">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-5">
                        <div>
                            <label for="passingPlayer" class="block text-sm font-medium text-gray-900">Passes :</label>
                            <input type="number" id="passingPlayer" name="passing_player" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Passes (10-99)">
                        </div>
                        <div>
                            <label for="dribblingPlayer" class="block text-sm font-medium text-gray-900">Dribbles :</label>
                            <input type="number" id="dribblingPlayer" name="dribbling_player" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Dribbles (10-99)">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-5">
                        <div>
                            <label for="defendingPlayer" class="block text-sm font-medium text-gray-900">Défense :</label>
                            <input type="number" id="defendingPlayer" name="defending_player" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Défense (10-99)">
                        </div>
                        <div>
                            <label for="physicalPlayer" class="block text-sm font-medium text-gray-900">Physique :</label>
                            <input type="number" id="physicalPlayer" name="physical_player" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Physique (10-99)">
                        </div>
                    </div>
                </div>
                
                <div id="statsGK" class="hidden">
                    <div class="grid grid-cols-2 gap-4 mb-5">
                        <div>
                            <label for="divingGK" class="block text-sm font-medium text-gray-900">Plongée :</label>
                            <input type="number" id="divingGK" name="diving_GK" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Plongée (10-99)">
                        </div>
                        <div>
                            <label for="handlingGK" class="block text-sm font-medium text-gray-900">Manipulation :</label>
                            <input type="number" id="handlingGK" name="handling_GK" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Manipulation (10-99)">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-5">
                        <div>
                            <label for="kickingGK" class="block text-sm font-medium text-gray-900">Dégagement :</label>
                            <input type="number" id="kickingGK" name="kicking_GK" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Dégagement (10-99)">
                        </div>
                        <div>
                            <label for="reflexesGK" class="block text-sm font-medium text-gray-900">Réflexes :</label>
                            <input type="number" id="reflexesGK" name="reflexes_GK" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Réflexes (10-99)">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-5">
                        <div>
                            <label for="speedGK" class="block text-sm font-medium text-gray-900">Vitesse :</label>
                            <input type="number" id="speedGK" name="speed_GK" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Vitesse (10-99)">
                        </div>
                        <div>
                            <label for="positioningGK" class="block text-sm font-medium text-gray-900">Positionnement :</label>
                            <input type="number" id="positioningGK" name="positioning_GK" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" placeholder="Positionnement (10-99)">
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-blue-700 text-white px-5 py-2 rounded-lg">Enregistrer</button>
                </div>
            </form>
        </div>
    </section>
    <script>
        const addPlayerButton = document.getElementById("addPlayerButton");
        const formulairePlayer = document.getElementById("formulairePlayer");
        const statsGK = document.getElementById("statsGK");
        const statPlayer = document.getElementById("statsPlayers");
        const positionPlayer = document.getElementById("positionPlayer");

        addPlayerButton.addEventListener("click", () => {
        formulairePlayer.classList.toggle("hidden");
        });

        positionPlayer.addEventListener("change", () => {
        if (positionPlayer.value === "GK") {
            statsGK.classList.remove("hidden");
            statPlayer.classList.add("hidden");
        } else {
            statsGK.classList.add("hidden");
            statPlayer.classList.remove("hidden");
        }
        });
    </script>
  <script src="../assets/js/script.js"></script>
</body>
</html>
