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
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Fut Champions</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="/assets/images/logo.webp" alt="">
            </div>
            <span class="logo_name">FUT Ultimite</span>
        </div>
    
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="#">
                    <i class="fas fa-users"></i>
                    <span class="link-name">Players</span>
                </a></li>
                <li><a href="#">
                    <i class="fas fa-flag"></i>
                    <span class="link-name">Nationality</span>
                </a></li>
                <li><a href="#">
                    <i class="fas fa-building"></i>
                    <span class="link-name">Club</span>
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
    
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search ...">
            </div>

        </div>
    
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="text">Dashboard</span>
                </div>
    
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
    </section>

    <script src="assets/js/script.js"></script>
</body>
</html>