USE vite_et_gourmand;
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

CREATE TABLE avis (
  id INT AUTO_INCREMENT PRIMARY KEY,
  commentaire TEXT NOT NULL,
  note INT NOT NULL CHECK (note BETWEEN 1 AND 5),
  valide BOOLEAN DEFAULT 0
);
INSERT INTO avis (commentaire, note, valide) VALUES 
('Un repas de mariage exceptionnel !', 5, 1),
('Très bon rapport qualité-prix.', 4, 1);