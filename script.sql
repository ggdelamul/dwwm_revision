CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    age INT CHECK (age >= 0),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO users (nom, prenom, email, age) VALUES
('Dupont', 'Jean', 'jean.dupont@example.com', 28),
('Martin', 'Claire', 'claire.martin@example.com', 34),
('Durand', 'Paul', 'paul.durand@example.com', 22),
('Bernard', 'Lucie', 'lucie.bernard@example.com', 45),
('Petit', 'Nicolas', 'nicolas.petit@example.com', 30),
('Robert', 'Sophie', 'sophie.robert@example.com', 27),
('Richard', 'Julien', 'julien.richard@example.com', 39),
('Moreau', 'Emma', 'emma.moreau@example.com', 19),
('Garcia', 'Lucas', 'lucas.garcia@example.com', 25),
('Faure', 'Camille', 'camille.faure@example.com', 33);




/*deuxième partie */
ALTER TABLE users
ADD COLUMN biographie TEXT DEFAULT NULL;

UPDATE users SET biographie = 'Développeur PHP passionné de cyclisme.' WHERE email = 'jean.dupont@example.com';
UPDATE users SET biographie = 'Graphiste indépendante, amatrice d\'art moderne.' WHERE email = 'claire.martin@example.com';
UPDATE users SET biographie = 'Étudiant en informatique, fan de jeux vidéo.' WHERE email = 'paul.durand@example.com';
UPDATE users SET biographie = 'Professeure de lettres et romancière à ses heures perdues.' WHERE email = 'lucie.bernard@example.com';
UPDATE users SET biographie = 'Commercial dynamique amateur de randonnée.' WHERE email = 'nicolas.petit@example.com';
UPDATE users SET biographie = 'Chargée de communication et passionnée par la photo.' WHERE email = 'sophie.robert@example.com';
UPDATE users SET biographie = 'Chef de projet dans l\'industrie automobile.' WHERE email = 'julien.richard@example.com';
UPDATE users SET biographie = 'Étudiante en biologie et bénévole dans une ONG.' WHERE email = 'emma.moreau@example.com';
UPDATE users SET biographie = 'Développeur front-end, fan de techno et de skate.' WHERE email = 'lucas.garcia@example.com';
UPDATE users SET biographie = 'Designer UX/UI, passionnée par le dessin.' WHERE email = 'camille.faure@example.com';


