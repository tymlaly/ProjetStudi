<div class="auth-header" style="text-align: center; margin-bottom: 30px;">
    <h2>Espace Client</h2>
    <p>Connectez-vous </p>
</div>

<div class="auth-container" style="display: flex; justify-content: center; gap: 40px; flex-wrap: wrap; padding: 20px;">
    
    <div class="login-box" style="border: 1px solid #ddd; padding: 25px; border-radius: 8px; width: 350px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <h3 style="color: #b8860b; border-bottom: 1px solid #ddd; padding-bottom: 10px;">Déjà client ?</h3>
        <!-- Note le action="" : il pointe vers la future route de traitement -->
        <form action="/public/index.php?page=login_traitement" method="POST">
            <div style="margin-bottom: 15px;">
                <label for="email_login">Email :</label><br>
                <input type="email" name="email" id="email_login" required style="width: 100%; padding: 8px; margin-top: 5px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="password_login">Mot de passe :</label><br>
                <input type="password" name="password" id="password_login" required style="width: 100%; padding: 8px; margin-top: 5px;">
            </div>
            <button type="submit" style="width: 100%; padding: 10px; background-color: #d4af37; color: white; text-decoration: none; border: none; border-radius: 5px; cursor: pointer; font-size: 1em;">Se connecter</button>
        </form>
    </div>

    <div class="register-box" style="border: 1px solid #ddd; padding: 25px; border-radius: 8px; width: 350px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <h3 style="color: #b8860b; border-bottom: 1px solid #ddd; padding-bottom: 10px;">Nouveau client ?</h3>
        <form action="/public/index.php?page=register_traitement" method="POST">
            <div style="margin-bottom: 15px; display: flex; gap: 10px;">
                <div style="flex: 1;">
                    <label for="nom">Nom :</label><br>
                    <input type="text" name="nom" id="nom" required style="width: 100%; padding: 8px; margin-top: 5px;">
                </div>
                <div style="flex: 1;">
                    <label for="prenom">Prénom :</label><br>
                    <input type="text" name="prenom" id="prenom" required style="width: 100%; padding: 8px; margin-top: 5px;">
                </div>
            </div>
            <div style="margin-bottom: 15px;">
                <label for="email_reg">Email :</label><br>
                <input type="email" name="email" id="email_reg" required style="width: 100%; padding: 8px; margin-top: 5px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="password_reg">Mot de passe :</label><br>
                <input type="password" name="password" id="password_reg" required style="width: 100%; padding: 8px; margin-top: 5px;">
            </div>
            <button type="submit" style="width: 100%; padding: 10px; background-color: #333; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 1em;">Créer mon compte</button>
        </form>
    </div>

</div>