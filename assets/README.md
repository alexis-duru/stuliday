# STULIDAY

# RESUME DU PROJET 

Le public ciblé concerne les jeunes dynamiques qui voyagent et qui
souhaitent rencontrer de nouvelles personnes en leur proposant de
partager leurs locations avec des inconnus et/ou des amis.
Les locations devront être peu chères et tous les utilisateurs devront
avoir le droit de réserver une annonce, mais aussi d’en poster.
Les locations devront être disponibles dans le monde entier et
donc l’interface devra être intégralement en anglais.
La charte graphique est au choix et des logos de base sont fournis
mais pourront être modifiés.


# SPECIAFICATIONS TECHNIQUES 

Ne pas utiliser Bootstrap (mais vous pouvez utiliser un autre framework CSS : Bulma, Tailwind, Material etc.)

# LES PAGES DU PROJET 


Ce sera un projet en PHP qui contiendra :
Une page d'accueil qui permet de naviguer sur les différentes pages
Une page de connexion/inscription
Une page d'affichage des biens
Une page de profil qui affiche les biens de la personne connectée et qui permet l'édition et la suppression.
Charte graphique libre
Spécifications liées au projet
Un powerpoint/canva de présentation sera réalisé qui contiendra un résumé du projet, le cahier des charges suivi (inclure la charte graphique choisie et les technologies employées).

Le dossier sera préparé pour le 5 Mai (dernier délai 16h). A déployer sur GitHub et m'envoyer le lien.

## STRUCTURE DU PROJET 

Structure de la base de données : 
    
    - users : 
         - username (varchar, 255, unique)
         - email (varchar, 255, unique) 
         - password (varchar, crypted, no-char-limit) 
         - role (varchar, 255) // (ou alors : on peut utiliser un int mais moins implicite)

<!-- Pour le projet studiday les products seront appartement pour la BDD -->

    - products : 
        - name (varchar, 255)
        - description (text)
        - price (int, 10)
        - created_at (datetime)
        - author (id_user)
        - category (id of category)

    - categories : 
        - name (varchar, 255, unique)


Structure du back-end :

    - Create : 
     - users : formulaire d'inscription
     - products : formulaire de création de products
     - categories : création de catégories via interface accessible aux admins

    - Read :
        - users : connexion, et liste users via interface accessible aux admins
        - product : liste products via interface accessible aux visiteurs 
        - categories : reliées aux products, tri par categories via recherche
    
    - Update : 
        - users : modification username via interface accessible aux users
        - products : modification products via interface accessible à l'author et l'admin
        - categories : modification categories via interface accessible aux admins 

    - Delete : 

        - users : désinscription
        - products : suppression de products via interface accessible a l'author et l'admin
        - categories : suppression de categories via interface accessible aux admins.
