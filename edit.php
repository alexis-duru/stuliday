<?php require 'inc/header.php' ?>
<?php

$id = $_GET['rental_id'];

$sqlRentals = "SELECT r.*, u.username, c.categories_name FROM rentals AS r LEFT JOIN users AS u ON r.author = u.id LEFT JOIN categories AS c ON r.rental_category = c.categories_id WHERE r.rental_id = '{$id}' ";

$rentals = $connect->query($sqlRentals)->fetch(PDO::FETCH_ASSOC);
?>


<?php

$sqlCategory = 'SELECT * FROM categories';
$categories = $connect->query($sqlCategory)->fetchAll();
if (isset($_POST['rental_submit']) && !empty($_POST['rental_name']) && !empty($_POST['rental_price']) && !empty($_POST['rental_description']) && !empty($_POST['rental_category'])) {
    $name = strip_tags($_POST['rental_name']);
    $description = strip_tags($_POST['rental_description']);
    $price = intval(strip_tags($_POST['rental_price']));
    $category = strip_tags($_POST['rental_category']);
    $user_id = $_SESSION['id'];

    if (is_int($price) && $price > 0) {
        try {
            $sth = $connect->prepare("UPDATE products
            SET
            WHERE rental_id = :id");
             $sth->bindValue(':rental_name', $name);
             $sth->bindValue(':rental_description', $description);
             $sth->bindValue(':rental_price', $price);
             $sth->bindValue(':category', $category);
             $sth->bindValue(':id', $id);

             $sth->execute();
             echo "Votre article a bien été modifié";
             header('Location: product.php?id=' . $id);
        } catch (PDOException $error) {
            echo 'Erreur: ' . $error->getMessage();
        }
    }
}
?>
    <section id="header-banner">
        <div id="header-banner-container">
            <div>
                <h2>MY PROFIL</h2>
            </div>
        </div>
    </section>

    <section id="section-rental-details">
        <div id="container-in-rental-details">
            <div id="container-in-1">
                <form action="#" method="POST">
                <div class="rental-item-details">
                <img src="assets/img/image/home/3.jpg">

                <div class="container-info-edit">
                    <label for="InputName">Nom de l'article</label>
                    <input type="text" id="InputName" placeholder="Nom de votre article" name="rental_name" value="<?php echo $rentals['rental_name']; ?>" required>
                </div>
                <div>
                    <label for="InputDescription">Description de l'article</label>
                    <textarea id="InputDescription" rows="3" name="rental_description" required><?php echo $rentals['rental_description']; ?></textarea>
                </div>
                <div>
                    <label for="InputPrice">Prix de l'article</label>
                    <input type="number" min="1" max="999999" class="form-control" id="InputPrice" placeholder="Prix de votre article en €" name="rental_price" value=<?php echo $rentals['rental_price']; ?> required>
                </div>
                <div>
                    <label for="InputCategory">Catégorie de l'article</label>
                    <select id="InputCategory" name="rental_category" required>
                        <?php echo $rentals['category']; ?>"><?php echo $rentals['rental_name']; ?>
                        <?php
                        //? On va boucler sur l'array categories, de façon à ce que chaque ligne de la boucle corresponde à une variable $category et aussi à une ligne de la BDD.
                        foreach ($categories as $category) {
                        ?>
                            <option <?php echo $category['categories_id'] === $rentals['rental_category'] ? 'selected' : ''; ?> value="<?php echo $rentals['rental_category']; ?>">
                                <?php echo $category['categories_name']; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <hr>
                <button type="submit" class="btn btn-success" name="rental_submit">Enregistrer l'article</button>
            </form>
            <div>
            </div>
        </div>
    </section>

    <?php require 'inc/footer.php' ?>
