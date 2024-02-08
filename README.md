# HireMe - Plateforme d'Emploi

HireMe souhaite développer une plateforme d'emploi permettant aux utilisateurs de trouver des opportunités d'embauche et aux entreprises de publier leurs offres. Le développement de cette plateforme sera réalisé en utilisant le framework Laravel.

## Fonctionnalités

- **Authentification et Autorisation**
  - Système d'authentification avec des rôles (Utilisateur standard, Entreprises, Administrateur).
  - Utilisation de politiques et de gardes pour régir l'accès en fonction du rôle.
  - Inscription et connexion des utilisateurs avec identifiants uniques.
  - Récupération de mot de passe et option "Se souvenir de moi".

- **Utilisateurs et Candidatures**
  - Curriculum vitae détaillé avec compétences, expériences, cursus éducatifs, langues maîtrisées.
  - Téléchargement du curriculum vitae au format PDF.
  - Possibilité pour un utilisateur de postuler à plusieurs offres d'emploi.

- **Fonctionnalités de recherche**
  - Recherche d'emploi par titre, compétences, type de contrat et emplacement.
  - Recherche d'entreprises, consultation des offres, et abonnement à la newsletter.

- **Entreprises et Gestion des Offres d'Emploi**
  - Publication de plusieurs offres d'emploi par une entreprise.
  - Consultation des candidatures reçues.

- **Administration et Gestion des Utilisateurs**
  - Gestion par les administrateurs des entreprises, des utilisateurs, et des offres d'emploi (soft delete).
  - Visualisation des statistiques par les administrateurs.

  ## Technologies Utilisées

- Laravel (framework PHP)
- Eloquent ORM
- HTML5
- Blade
- CSS (tailwind for styling)
- JavaScript
- MySQL 

## Configuration et Installation

1. **Cloner le Répertoire**
   ```bash
   git clone https://github.com/nom_du_repo.git

**Configurer l'Environnement**

Copier le fichier .env.example en .env.
Configurer les paramètres de base de données et autres variables d'environnement dans le fichier .env.

**Installer les Dépendances**
composer install

**Générer la Clé d'Application**
php artisan key:generate

**Exécuter les Migrations et les Seeders**
php artisan migrate --seed

**Lancer le Serveur**
php artisan serve

**Accéder à l'Application**
Ouvrir un navigateur et aller à http://localhost:8000

  ## Contribution

  Les contributions visant à améliorer les fonctionnalités, la sécurité et l'accessibilité du système sont les bienvenues. Veuillez suivre les normes et directives de codage établies.

  ## Licence

  Ce projet est sous licence [MIT](LICENSE.md). N'hésitez pas à utiliser, modifier et distribuer le code conformément aux termes de la licence.

  ## Auteur

  - [Douae Sebti](https://github.com/Douaesb)


