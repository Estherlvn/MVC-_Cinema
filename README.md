# 🎬 Gestion de Film - PHP/MVC

Ce projet est une application web permettant de gérer une base de données de films, acteurs, réalisateurs et genres. 
Il est développé en **PHP** avec une architecture **MVC** et utilise **PDO** pour l'accès à la base de données.

## 🚀 Fonctionnalités

- 📌 **Ajouter, modifier et supprimer** des films
- 🎭 **Gérer les acteurs et réalisateurs**
- 🎬 **Associer un réalisateur à un film**
- 🎭 **Lier des acteurs à un film**
- 🏷️ **Gérer les genres de films**
- 🔍 **Lister et afficher les détails des films, acteurs et réalisateurs**
  
## 📂 Structure du projet

📁 projet-film  
│── 📁 controller │  
├── FilmController.php │ ├── ActeurController.php │ ├── RealisateurController.php │ ├── GenreController.php   
│── 📁 model │ ├── Connect.php │ ├── Film.php │ ├── Acteur.php │ ├── Realisateur.php │ ├── Genre.php  
│── 📁 view │  
├── film │ │ ├── listFilms.php │ │ ├── addFilm.php │  
├── acteur │ │ ├── listActeurs.php │ │ ├── addActeur.php │  
├── realisateur │ │ ├── listRealisateurs.php │ │ ├── addRealisateur.php │  
├── genre │ │ ├── listGenres.php │ │ ├── addGenre.php  
│── 📁 public │ ├── index.php  
│── 📁 assets │ ├── styles.css  


## ⚙️ Installation

1. **Cloner le dépôt**  
   ```sh
   git clone https://github.com/Estherlvn/Projet_Forum-MVC
   cd Projet_Forum-MVC
   
2. **Configurer la base de données**
Importer le fichier database.sql (fourni dans le projet) dans votre serveur MySQL.
Modifier le fichier Connect.php avec vos informations de connexion.
3. **Lancer le serveur PHP**
Accéder à l'application sur http://localhost:8000/

🛠️ Technologies utilisées
PHP (MVC, PDO)
MySQL (Gestion des données)
HTML/CSS (Interface utilisateur)
Bootstrap (Framework CSS pour un design responsive)

Réalisation: Estherlvn

🎥 Projet réalisé dans un but pédagogique et d'apprentissage avec ELAN FORMATION, 2024/2025.



   
