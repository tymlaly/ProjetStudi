<div class="home-container" style="padding: 2rem 10%;">
    <section class="hero" style="text-align: center; padding: 4rem 0; background-color: #F9F9F9; border-radius: 8px; margin-bottom: 3rem;">
        <h1 style="font-size: 3rem; color: #722F37; margin-bottom: 1rem;">Vite & Gourmand</h1>
        <p style="font-size: 1.2rem; color: #555; max-width: 600px; margin: 0 auto 2rem auto;">
            Traiteur d'excellence à Bordeaux depuis 25 ans. Julie et José subliment tous vos événements (Noël, Pâques, mariages, repas d'entreprise) avec des menus en constante évolution.
        </p>
        <a href="/index.php?page=menus" style="background-color: #D4AF37; color: white; padding: 0.8rem 2rem; text-decoration: none; font-weight: bold; border-radius: 4px;">Découvrir nos menus</a>
    </section>

    <section class="avis-section" style="margin-top: 3rem;">
        <h2 style="text-align: center; color: #722F37; margin-bottom: 2rem;">Ce que nos clients disent de nous</h2>
        
        <div class="avis-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
            <?php
            try {
                $stmt = $pdo->query("SELECT * FROM avis WHERE valide = 1 LIMIT 3");
                $avisList = $stmt->fetchAll();

                if ($avisList) {
                    foreach ($avisList as $avis) {
                        echo '<div style="background: #fff; border: 1px solid #ddd; padding: 1.5RPrem; border-radius: 6px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">';
                        echo '<p style="font-style: italic; margin-bottom: 1rem;">"' . htmlspecialchars($avis['commentaire']) . '"</p>';
                        echo '<p style="font-weight: bold; color: #722F37;">Note : ' . intval($avis['note']) . ' / 5</p>';
                        echo '</div>';
                    }
                } else {
                    echo '<p style="text-align: center; color: #666; grid-column: 1 / -1;">Aucun avis validé pour le moment.</p>';
                }
            } catch (PDOException $e) {
                echo '<p style="text-align: center; color: red;">Erreur SQL : "' . $e->getMessage() . '"</p>';
            }
            ?>
        </div>
        <div style="text-align: center; padding: 50px 20px; min-height: 50vh;">
    <h1 style="color: #b8860b;">Bienvenue chez Vite & Gourmand</h1>
    
<?php if (isset($_GET['success']) && $_GET['success'] === 'commande'): ?>
        <div style="background-color: #d4edda; color: #155724; padding: 15px 30px; border-radius: 5px; border: 1px solid #c3e6cb; margin: 20px auto; display: inline-block; font-weight: bold;">
            🎉 Merci pour votre achat ! Votre commande a bien été enregistrée.
        </div>
    <?php endif; ?>
    
    <p style="font-size: 1.2em; margin-top: 20px;">Le meilleur traiteur pour tous vos événements.</p>
    
    <a href="/public/index.php?page=menus" style="display: inline-block; margin-top: 30px; padding: 10px 20px; background-color: #333; color: white; text-decoration: none; border-radius: 5px;">Voir nos menus</a>
</div>
    </section>
</div> 