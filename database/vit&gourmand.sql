CREATE TABLE role (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(50) NOT NULL
);

CREATE TABLE theme (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(50) NOT NULL
);

CREATE TABLE allergene (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(50) NOT NULL
);

CREATE TABLE horaire (
    id INT AUTO_INCREMENT PRIMARY KEY,
    heure_ouverture VARCHAR(50),
    heure_fermeture VARCHAR(50)
);

CREATE TABLE plat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(50) NOT NULL,
    description VARCHAR(255),
    image BLOB
);

CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    gsm VARCHAR(20),
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    adresse_postale VARCHAR(255),
    role_id INT NOT NULL,
    FOREIGN KEY (role_id) REFERENCES role(id)
);

CREATE TABLE menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(50) NOT NULL,
    nombre_personne_minimum INT NOT NULL,
    prix_par_personne DOUBLE NOT NULL,
    regime VARCHAR(50),
    description VARCHAR(255),
    quantite_restante INT,
    theme_id INT NOT NULL,
    FOREIGN KEY (theme_id) REFERENCES theme(id)
);

CREATE TABLE commande (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_commande VARCHAR(50) NOT NULL UNIQUE,
    date_commande DATE NOT NULL,
    date_livraison DATE NOT NULL,
    heure_livraison VARCHAR(50),
    prix_livraison DOUBLE,
    nombre_personne INT NOT NULL,
    prix_total DOUBLE NOT NULL,
    statut VARCHAR(50) NOT NULL,
    pret_materiel BOOL,
    restitution_materiel BOOL,
    utilisateur_id INT NOT NULL,
    menu_id INT NOT NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id),
    FOREIGN KEY (menu_id) REFERENCES menu(id)
);

CREATE TABLE contient (
    plat_id INT NOT NULL,
    allergene_id INT NOT NULL,
    PRIMARY KEY (plat_id, allergene_id),
    FOREIGN KEY (plat_id) REFERENCES plat(id),
    FOREIGN KEY (allergene_id) REFERENCES allergene(id)
);

CREATE TABLE compose (
    menu_id INT NOT NULL,
    plat_id INT NOT NULL,
    PRIMARY KEY (menu_id, plat_id),
    FOREIGN KEY (menu_id) REFERENCES menu(id),
    FOREIGN KEY (plat_id) REFERENCES plat(id)
);