<?php
include("../database/connection.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM Clubs WHERE club_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Erreur lors de la recuperation de donner : ".mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);

        if (!$row) {
            die("Aucune nationalité trouvée pour cet ID.");
        }
    }
} else {
    die("ID non spécifié.");
}

if (isset($_POST['updateClube'])) {
    $club_name = mysqli_real_escape_string($connection, $_POST['club_name']);
    $logo_url = mysqli_real_escape_string($connection, $_POST['logo_url']);
    $id = $_POST['id'];

    $sql = "UPDATE Clubs SET club_name = ?, logo = ? WHERE club_id = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, 'ssi', $club_name, $logo_url, $id);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: club.php");
        exit();
    } else {
        die("Échec de la mise à jour : " . mysqli_error($connection));
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
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

        <!-- Formulaire modification -->
        <form id="nationalityForm" class="max-w-sm mx-auto mt-5" method="POST" action="">
            <div class="mb-5">
                <label for="club_name" class="block text-sm font-medium text-gray-900">Nationalité</label>
                <input type="text" name="club_name" id="club_name" 
                       class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" 
                       required value="<?php echo htmlspecialchars($row['club_name']); ?>">
            </div>
            <div class="mb-5">
                <label for="logo_url" class="block text-sm font-medium text-gray-900">URL du drapeau</label>
                <input type="url" name="logo_url" id="logo_url" 
                       class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5" 
                       required value="<?php echo htmlspecialchars($row['logo']); ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $row['club_id']; ?>">
            <button type="submit" class="bg-blue-700 text-white px-5 py-2 rounded-lg" name="updateClube" value="UPDATE">Enregistrer</button>
        </form>
    </section>
</body>
</html>
