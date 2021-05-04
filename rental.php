<?php require 'inc/header.php' ?>

<?php
//! Affichage de tous les produits. Il faudra une requête SQL qui récupère tous les produits, et qui les affiche dans des cartes séparées.

//? Création de ma requête SQL. Vu que j'ai des colonne qui font référence à d'autres tables, je dois ajouter des jointures sur category et author.
$sqlRental = "SELECT r.*, u.username, c.categories_name FROM rental AS r LEFT JOIN users AS u ON r.author = u.id LEFT JOIN categories AS c ON r.rental_category = c.categories_id";

echo '<pre>';
var_dump($_POST);

//? Le résultat de ma requête est affiché dans un tableau associatif à l'aide du chaînage de méthodes.
$rentals = $connect->query($sqlRental)->fetchAll(PDO::FETCH_ASSOC);

?>
    <section id="header-banner">
        <div id="header-banner-container">
            <div>
                <h2>RENTAL</h2>
            </div>
        </div>
    </section>

    <section id="rental-container">
        <div id="container-in">
            <?php
             //? Je veux afficher tous mes produits, selon le même modèle, donc je fais une boucle, et j'insère les données dynamiques dans une carte sur laquelle je ferais une boucle. Résultat: J'obtiens autant de cartes que de produits, et toutes les cartes respectent le même format HTML.
            foreach ($rentals as $rental) {
            ?>
                <div class="rental">
                    <img src="assets/img/image/home/3.jpg">
                    <div>
                        <h3>STULIDAY #1<?php echo $rental['rental_name']; ?></h3>
                        <p>Description : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus laboriosam
                            dolorum sed corporis eligendi facere facilis explicabo placeat sint eveniet. Qui alias
                            asperiores amet sapiente voluptatum est nisi totam soluta.<?php echo $product['rental_description']; ?></p>
                        <div class="price">
                            <p class="amount">25€<?php echo $product['rental_price']; ?></p>
                            <p> / </p>
                            <h4>NIGHT</h4>
                        </div>
                        <p><?php echo $product['rental_name']; ?></p>
                        <p><?php echo $product['created_at']; ?></p>
                        <div id="btn-details-rental">
                            <p><a href="rental-details.php">details</a></p>
                        </div>
                        <img id="etoile" src="assets/img/icones/star.png">
                        <img id="etoile" src="assets/img/icones/star.png">
                        <img id="etoile" src="assets/img/icones/star.png">
                        <img id="etoile" src="assets/img/icones/star.png">
                    </div>
                </div>
                <?php
              }
                ?>

            <!-- <div class="rental">
                <img src="assets/img/image/home/4.jpg">
                <div>
                    <h3>STULIDAY #2</h3>
                    <p>Description : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus laboriosam
                        dolorum sed corporis eligendi facere facilis explicabo placeat sint eveniet. Qui alias
                        asperiores amet sapiente voluptatum est nisi totam soluta.</p>
                    <div class="price">
                        <p class="amount">30€</p>
                        <p> / </p>
                        <h4>NIGHT</h4>
                    </div>
                    <div id="btn-details-rental">
                        <p><a href="rental-details.php">details</a></p>
                    </div>
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                </div>
            </div>
            
            <div class="rental">
                <img src="assets/img/image/home/5.jpg">
                <div>
                    <h3>STULIDAY #3</h3>
                    <p>Description : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus laboriosam
                        dolorum sed corporis eligendi facere facilis explicabo placeat sint eveniet. Qui alias
                        asperiores amet sapiente voluptatum est nisi totam soluta.</p>
                    <div class="price">
                        <p class="amount">13€</p>
                        <p> / </p>
                        <h4>NIGHT</h4>
                    </div>
                    <div id="btn-details-rental">
                        <p><a href="rental-details.php">details</a></p>
                    </div>
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                </div>
            </div>

            <div class="rental">
                <img src="assets/img/image/home/6.jpg">
                <div>
                    <h3>STULIDAY #4</h3>
                    <p>Description : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus laboriosam
                        dolorum sed corporis eligendi facere facilis explicabo placeat sint eveniet. Qui alias
                        asperiores amet sapiente voluptatum est nisi totam soluta.</p>
                    <div class="price">
                        <p class="amount">15€</p>
                        <p> / </p>
                        <h4>NIGHT</h4>
                    </div>
                    <div id="btn-details-rental">
                        <p><a href="rental-details.php">details</a></p>
                    </div>
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                </div>
            </div>

            <div class="rental">
                <img src="assets/img/image/home/7.jpg">
                <div>
                    <h3>STULIDAY #5</h3>
                    <p>Description : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus laboriosam
                        dolorum sed corporis eligendi facere facilis explicabo placeat sint eveniet. Qui alias
                        asperiores amet sapiente voluptatum est nisi totam soluta.</p>
                        <div class="price">
                            <p class="amount">12€</p>
                            <p> / </p>
                            <h4>NIGHT</h4>
                        </div>
                        <div id="btn-details-rental">
                            <p><a href="rental-details.php">details</a></p>
                        </div>
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                </div>
            </div>

            <div class="rental">
                <img src="assets/img/image/home/8.jpg">
                <div>
                    <h3>STULIDAY #6</h3>
                    <p>Description : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus laboriosam
                        dolorum sed corporis eligendi facere facilis explicabo placeat sint eveniet. Qui alias
                        asperiores amet sapiente voluptatum est nisi totam soluta.</p>
                    <div class="price">
                        <p class="amount">25€</p>
                        <p> / </p>
                        <h4>NIGHT</h4>
                    </div>
                    <div id="btn-details-rental">
                        <p><a href="rental-details.php">details</a></p>
                    </div>
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                </div>
            </div>

            <div class="rental">
                <img src="assets/img/image/home/1.jpg">
                <div>
                    <h3>STULIDAY #7</h3>
                    <p>Description : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus laboriosam
                        dolorum sed corporis eligendi facere facilis explicabo placeat sint eveniet. Qui alias
                        asperiores amet sapiente voluptatum est nisi totam soluta.</p>
                        <div class="price">
                            <p class="amount">20€</p>
                            <p> / </p>
                            <h4>NIGHT</h4>
                        </div>
                        <div id="btn-details-rental">
                            <p><a href="rental-details.php">details</a></p>
                        </div>
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                </div>
            </div>

            <div class="rental">
                <img src="assets/img/image/home/2.jpg">
                <div>
                    <h3>STULIDAY #8</h3>
                    <p>Description : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus laboriosam
                        dolorum sed corporis eligendi facere facilis explicabo placeat sint eveniet. Qui alias
                        asperiores amet sapiente voluptatum est nisi totam soluta.</p>
                    <div class="price">
                        <p class="amount">25€</p>
                        <p> / </p>
                        <h4>NIGHT</h4>
                    </div>
                    <div id="btn-details-rental">
                        <p><a href="rental-details.php">details</a></p>
                    </div>
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                </div>
            </div>

            <div class="rental">
                <img src="assets/img/image/home/9.jpg">
                <div>
                    <h3>STULIDAY #9</h3>
                    <p>Description : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus laboriosam
                        dolorum sed corporis eligendi facere facilis explicabo placeat sint eveniet. Qui alias
                        asperiores amet sapiente voluptatum est nisi totam soluta.</p>
                    <div class="price">
                        <p class="amount">25€</p>
                        <p> / </p>
                        <h4>NIGHT</h4>
                    </div>
                    <div id="btn-details-rental">
                        <p><a href="rental-details.php">details</a></p>
                    </div>
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                    <img id="etoile" src="assets/img/icones/star.png">
                </div>
            </div> -->
        </div>
    </section>

    <?php require 'inc/footer.php' ?>
