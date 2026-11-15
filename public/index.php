<?php

session_start();

require_once __DIR__ . '/../config/db.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'accueil';

require_once __DIR__ . '/../views/layout/header.php';

switch ($page) {
    case 'connexion':
        
        require_once __DIR__ . '/../views/connexion.php';
        break; 

    case 'register_traitement':
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = trim($_POST['nom']);
            $prenom = trim($_POST['prenom']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $role_id = 2; 

            try {
                $stmt = $pdo->prepare("INSERT INTO utilisateur (nom, prenom, email, password, role_id) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$nom, $prenom, $email, $hashedPassword, $role_id]);
                
                header('Location: /public/index.php?page=connexion');
                exit;
            } catch (PDOException $e) {
                echo "Erreur lors de l'inscription : L'adresse email est peut-être déjà utilisée.";
            }
        }
        break; 

    case 'login_traitement':

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            
        if ($user && password_verify($password, $user['password'])) {
                
             
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_nom'] = $user['nom'];
                $_SESSION['user_prenom'] = $user['prenom'];
                $_SESSION['role_id'] = $user['role_id'];

             
                header('Location: /public/index.php?page=accueil');
                exit;
            } 

        else {
                echo "<p style='color:red; text-align:center; margin-top:50px;'>Identifiants incorrects. <a href='/public/index.php?page=connexion'>Réessayer</a></p>";
            }
        }
        break;
    case 'logout':

        session_destroy();
        header('Location: /public/index.php?page=accueil');
        exit;

    case 'accueil':

        require_once __DIR__ . '/../views/home.php';
        break;

    case 'add_panier':
    
        if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
        }
    
    
        if (isset($_GET['id'])) {
        $id_menu = (int)$_GET['id'];
        
       
        if (isset($_SESSION['panier'][$id_menu])) {
            $_SESSION['panier'][$id_menu]++;
        } else {
            $_SESSION['panier'][$id_menu] = 1;
        }
    }

    case 'panier':
        require_once __DIR__ . '/../views/panier.php';
        break;

    case 'checkout':
    
        if (!isset($_SESSION['user_id'])) {
        header('Location: /public/index.php?page=connexion');
        exit;
    }
        require_once __DIR__ . '/../views/checkout.php';
        break;

    case 'checkout_traitement':
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
        
        
        $date_livraison = $_POST['date_livraison'];
        $heure_livraison = $_POST['heure_livraison'];
        $pret_materiel = (int)$_POST['pret_materiel'];
        
        
        $numero_commande = 'CMD-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -4));
        $date_commande = date('Y-m-d'); 
        $statut = 'En attente'; 
        
      
        $ids = array_keys($_SESSION['panier']);
        $premier_menu_id = $ids[0]; 
        $quantite = $_SESSION['panier'][$premier_menu_id];
        
     
        $stmt_menu = $pdo->prepare("SELECT prix_par_personne FROM menu WHERE id = ?");
        $stmt_menu->execute([$premier_menu_id]);
        $menu = $stmt_menu->fetch(PDO::FETCH_ASSOC);
        
        $prix_livraison = 0; 
        $prix_total = ($menu['prix_par_personne'] * $quantite) + $prix_livraison;
        
        
        $utilisateur_id = $_SESSION['user_id'];

        try {
           
            $sql = "INSERT INTO commande (numero_commande, date_commande, date_livraison, heure_livraison, prix_livraison, nombre_personne, prix_total, statut, pret_materiel, utilisateur_id, menu_id) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $numero_commande, 
                $date_commande, 
                $date_livraison, 
                $heure_livraison, 
                $prix_livraison, 
                $quantite, 
                $prix_total, 
                $statut, 
                $pret_materiel, 
                $utilisateur_id, 
                $premier_menu_id
            ]);

          
            unset($_SESSION['panier']);
            
            header('Location: /public/index.php?page=accueil&success=commande');
            exit;

        } 
        catch (PDOException $e) {
    
            header('Location: /public/index.php?page=panier&error=1');
            exit;
        }
            header('Location: /public/index.php?page=panier&error=1');
            exit;
        }
    
    break;

    case 'contact':

        require_once __DIR__ . '/../views/contact.php';
        break;

    case 'admin_commandes':
    
        if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
        header('Location: /public/index.php?page=accueil');
        exit;
    }
        require_once __DIR__ . '/../views/admin_commandes.php';
        break;

    case 'contact_traitement':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $nom = htmlspecialchars(trim($_POST['nom']));
        $email = htmlspecialchars(trim($_POST['email']));
        $message = htmlspecialchars(trim($_POST['message']));

       
        header('Location: /public/index.php?page=contact&success=1');
        exit;
    }
        break;

    case 'admin_menus':
        if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
        header('Location: /public/index.php?page=accueil');
        exit;
    }
        require_once __DIR__ . '/../views/admin_menus.php';
        break;

    case 'admin_menus_traitement':

        if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
        header('Location: /public/index.php?page=accueil');
        exit;
    }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titre = trim($_POST['titre']);
        $prix = (float)$_POST['prix_par_personne'];

        try {
                
                $stmt = $pdo->prepare("INSERT INTO menu (titre, prix_par_personne, nombre_personne_minimum, theme_id) VALUES (?, ?, ?, ?)");
                $stmt->execute([$titre, $prix, 1, 1]);
                
                
        header('Location: /public/index.php?page=admin_menus&success=1');
        exit;
           } catch (PDOException $e) {
    
        header('Location: /public/index.php?page=admin_menus&error=1');
        exit;
}
          
    }
    break;
    
        header('Location: /public/index.php?page=menus');
        exit;

    case 'menus':

        require_once __DIR__ . '/../views/menus.php';
        break;

    case 'contact':

        echo "<div style='padding: 4rem; text-align: center;'><h2>Formulaire de contact (En cours de développement)</h2></div>";
        break;

    default:
        echo "<div style='padding: 4rem; text-align: center;'><h2>404 - Page introuvable</h2></div>";
        break;

    case 'admin':
    
    if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
        header('Location: /public/index.php?page=accueil');
        exit;
    }
        require_once __DIR__ . '/../views/admin.php';
        break;
}

        require_once __DIR__ . '/../views/layout/footer.php';