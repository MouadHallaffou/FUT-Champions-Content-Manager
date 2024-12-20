<?php
include("../database/connection.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    
    $query = "SELECT * FROM players WHERE player_id = ?";
    $stmt = mysqli_prepare($connection , $query);
    mysqli_stmt_bind_param($stmt , 'i' ,$id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(!$result){
        die("erreur lors de la recuperation de donner : " .mysqli_error($connection));
    }else{
        $row = mysqli_fetch_assoc($result);

        if (!$row){
            die ("aucun player trouve par ce ID");
        }
    }
}else{
    die("ID non spécifié.");
}

if (isset($_POST['updatePlayer'])){
    $id = $_POST['id'];
    $player_name = mysqli_real_escape_string($connection , $_POST['player_name']);
    $photo_player = mysqli_real_escape_string($connection , $_POST['player_name']);
    $nationality_player = mysqli_real_escape_string($connection , $_POST['player_name']);
    $club_player = mysqli_real_escape_string($connection , $_POST['player_name']);
    $position_player = mysqli_real_escape_string($connection , $_POST['player_name']) ;
    $rating_player = mysqli_real_escape_string($connection , $_POST['player_name']) ;
    $pace_player = mysqli_real_escape_string($connection , $_POST['player_name']);
    $shooting_player = mysqli_real_escape_string($connection , $_POST['player_name']);
    $passing_player = mysqli_real_escape_string($connection , $_POST['player_name']);
    $dribbling_player = mysqli_real_escape_string($connection , $_POST['player_name']);
    $defending_player = mysqli_real_escape_string($connection , $_POST['player_name']);
    $physical_player = mysqli_real_escape_string($connection , $_POST['player_name']);



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

</body>
</html>
