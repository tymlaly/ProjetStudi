<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vite & Gourmand - Traiteur Événementiel à Bordeaux</title>
    <link rel="stylesheet" href="/public/assets/css/style.css">
</head>
<body>
    <header>
        <div class="logo-container">
            vite & gourmand
        </div>
        <nav>
            <ul>
            <li><a href="/public/index.php?page=accueil">accueil</a></li>
            <li><a href="/public/index.php?page=menus">nos menus</a></li>
            <li><a href="/public/index.php?page=contact">contact</a></li>

            <?php if (isset($_SESSION['user_id'])): ?>
                
                <?php if ($_SESSION['role_id'] == 1): ?>
                
                    <li><a href="/public/index.php?page=admin" style="color: #b8860b; font-weight: bold;">Espace Admin</a></li>
                <?php else: ?>
            
                    <li><a href="/public/index.php?page=panier">Mon Panier</a></li>
                <?php endif; ?>
                
                <li><a href="#">Bonjour <?= htmlspecialchars($_SESSION['user_prenom']) ?></a></li>
                <li><a href="/public/index.php?page=logout" class="btn-connexion" style="background-color: #333; color: white;">déconnexion</a></li>
            
            <?php else: ?>
                
                <li><a href="/public/index.php?page=connexion" class="btn-connexion">connexion / panier</a></li>
            <?php endif; ?>
        </ul>
        </nav>
    </header>
    <main>