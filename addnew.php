    <?php require 'inc/header.php' ?>
    <?php

    //? Requête SQL pour récupérer toutes les catégories depuis la base de données, afin d'afficher un dropdown de toutes les catégories existantes.


    $sqlCategory = 'SELECT * FROM categories';

    //? On a raccourci la façon de récupérer en chaînant les méthodes query et fetch. (chaîner des méthodes signifie que l'on utilise deux fonctions d'un objet à la suite. exemple: $objet->function1()->fonction2())
    //* Le fetchAll signifie que l'on utilise la méthode fetch de manière indifférenciée (pas de précision de retour d'array, on veut juste la totalité des données. Par défaut: il retourne un array associatif et un array indexé qui contient les mêmes données) pour toutes les lignes correspondantes à la requête.

    $categories = $connect->query($sqlCategory)->fetchAll();

    // var_dump($categories);

    /**
     * ! Créer un nouvel article à partir du formulaire.
     * 
     * TODO : Vérification intro : si le bouton est cliqué et si le formulaire est rempli
     * 
     * TODO : Initialisation des variables & assainissement
     * 
     * TODO : Vérification du prix positif
     * 
     * TODO : Enregistrement des données
     */

    //? Etape 1 : Vérification de la validité du formulaire et de l'appui sur le bouton envoi

    // echo '<pre>';
    // var_dump($categories);
    // echo '</pre>';
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';

    if (isset($_POST['rental_submit']) && !empty($_POST['rental_name']) && !empty($_POST['rental_price']) && !empty($_POST['rental_description']) && !empty($_POST['rental_category']) && !empty($_POST['square_meter']) && !empty($_POST['rental_adress'])) {
        // var_dump("it's ok ❤");

        //? Etape 2 : Initialisation des variables & assainissement (via strip_tags cette fois)


        $name = strip_tags($_POST['rental_name']);
        $description = strip_tags($_POST['rental_description']);
        $price = intval(strip_tags($_POST['rental_price']));
        $adress = strip_tags($_POST['rental_adress']);
        $category = intval(strip_tags($_POST['rental_category']));
        $squaremeter = intval(strip_tags($_POST['square_meter']));
        // $author = strip_tags($_POST['author']);
        $user_id = $_SESSION['id'];

        // VARIABLE POUR L'IMAGE //

        $image = $_FILES['rentals_image'];

        var_dump($image);
        if ($image['size'] > 0) {

        // Vérification de la taille du fichier
        if ($image['size'] <= 10000000) {
            // echo '<pre>';
            var_dump('ok');
            // echo '</pre>';
            //* Vérification du format du fichier
            $valid_ext = ['jpg', 'jpeg', 'png'];
            $check_ext = strtolower(substr(strrchr($image['name'], '.'), 1));
            if (in_array($check_ext, $valid_ext)) {
                    var_dump('ok');
                //* Vérifier la validité du fichier (via MIME type) -- Pas fait ici --
                //* Envoi du fichier au serveur

                $image_name = uniqid() . '_' . $image['name'];
                $upload_dir = "./public/uploads/";
                $upload_name = $upload_dir . $image_name;
                $upload_result = move_uploaded_file($image['tmp_name'], $upload_name);
                if ($upload_result) {
                    //* Insertion des données dans la BDD suivant le schéma d'avant
                    //? Etape 3 : Vérification du prix positif : Vérifier que le prix est un chiffre entier, que ce prix est supérieur à 0
                    if (is_int($price) && $price > 0) {
                        //? Etape 4 : Enregistrement des données du formulaire via une requete préparée sql INSERT
                        try {
                            $sth = $connect->prepare("INSERT INTO rentals
                            (rental_name, rental_description, rental_price, rental_adress, author, rental_category, square_meter, image)
                            VALUES
                            (:rental_name, :rental_description, :rental_price, :rental_adress, :author, :rental_category, :square_meter, :image)");
                        
                                //? J'affecte chacun des paramètres nommés à leur valeur via un bindValue. Cette opération me protège des injections SQL (en + de l'assainissement des variables)
                            $sth->bindValue(':rental_name', $name);
                            $sth->bindValue(':rental_description', $description);
                            $sth->bindValue(':rental_price', $price);
                            $sth->bindValue(':rental_adress', $adress);
                            $sth->bindValue(':rental_category', $category);
                            $sth->bindValue(':square_meter', $squaremeter);
                            $sth->bindValue(':author', $user_id);
                            $sth->bindValue(':image', $image_name);
                
                            //? J'exécute ma requête SQL d'insertion avec execute()
                
                            $sth->execute();
                            echo "Votre article a bien été ajouté";
                        
                            //? Je redirige vers la page des produits.
                
                            // header('Location: rental.php');
                        } catch (PDOException $error) {
                            echo 'Erreur: ' . $error->getMessage();
                        }
                    }
                }
            }
        }
    } else {
        //! Si aucune image n'a été upload, on refait la requête sans l'image
        //? Etape 3 : Vérification du prix positif : Vérifier que le prix est un chiffre entier, que ce prix est supérieur à 0
        if (is_int($price) && $price > 0) {
            //? Etape 4 : Enregistrement des données du formulaire via une requete préparée sql INSERT
            try {
                //? Préparation de la requête, je définis la requête à exécuter avec des valeurs génériques (des paramètres nommés).
                $sth = $connect->prepare("INSERT INTO rentals
                (rental_name, rental_description, rental_price, rental_adress, author, rental_category, square_meter)
                VALUES
                (:rental_name, :rental_description, :rental_price, :rental_adress, :author, :rental_category, :square_meter)");
            
                    //? J'affecte chacun des paramètres nommés à leur valeur via un bindValue. Cette opération me protège des injections SQL (en + de l'assainissement des variables)
                $sth->bindValue(':rental_name', $name);
                $sth->bindValue(':rental_description', $description);
                $sth->bindValue(':rental_price', $price);
                $sth->bindValue(':rental_adress', $adress);
                $sth->bindValue(':rental_category', $category);
                $sth->bindValue(':square_meter', $squaremeter);
                $sth->bindValue(':author', $user_id);

                //? J'exécute ma requête SQL d'insertion avec execute()
                $sth->execute();


                echo "Votre article a bien été ajouté";

                //? Je redirige vers la page des produits.
                // header('Location: rental.php');
            } catch (PDOException $error) {
                echo 'Erreur: ' . $error->getMessage();
            }
        }
    }
}


?>
    <section id="header-banner">
        <div id="header-banner-container">
            <div>
                <h2>ADD NEW</h2>
            </div>
        </div>
    </section>
    
    <section id="section-addnew">
        <div id="section-addnew-container">
            <div id="container-addnew-item">
            <!-- ENDROIT OU J'INSCRIS LES DONNEES POUR L'ENVOI DE PHOTO -->
                <form action="#" method="post" enctype="multipart/form-data">
                    <h3>DETAILS OF YOUR RENTAL</h3>
                    <input class="input-form" type="text" name="rental_name" value="" placeholder="Name of your rental">
                    <h3>PHOTO OF YOUR RENTAL</h3>
                    <!-- UPLOAD D'IMAGE -->
                    <div class="input-form">
                        <input type="file" id='Inputimage' name='rentals_image' accept=".png, .jpg, .jpeg">
                    </div>
                    <h3>DESCRIBE YOUR RENTAL</h3>
                    <select class="input-form" name="rental_category">
                        <label class="input-form" for="category-select">Choose your rental</label>
                        <option value="">--Please choose your rental--</option>
                        <?php
                        foreach ($categories as $category) {
                        ?>
                            <option value="<?php echo $category['categories_id']; ?>">
                                <?php echo $category['categories_name']; ?>
                            </option>
                        <?php
                        }
                        ?>
                        <!-- <option value="category">Home</option>
                        <option value="category">Apartment</option> -->
                    <textarea class="input-form" rows="5" id="description" value="" placeholder="Details"
                        name="rental_description"></textarea>
                    <h3>PRICE</h3>
                    <input class="input-form" type="text" name="rental_price" value="" placeholder="Price (euros)" required>
                    <h3>LOCATION</h3>
                    <input class="input-form" type="text" name="rental_adress" value="" placeholder="Adress">
                    <h3>SQUARE METER</h3>
                    <input class="input-form" type="number" id="square-meter" name="square_meter" placeholder="square meter">
                <div id="create-return">
                    <button name="rental_submit" type="submit">CREATE</button>
                    <a class="btn-return" href="profil.php">BACK HOME</a>
                </div>
                </form>
            </div>
        </div>
        </div>
    </section>

    <?php require 'inc/footer.php' ?>
    