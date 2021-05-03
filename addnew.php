<?php require 'inc/header.php' ?>
<?php
$sqlCategory = 'SELECT * FROM categories';
$categories = $connect->query($sqlCategory)->fetchAll();
var_dump($categories);

if (isset($_POST['rental_submit']) && !empty($_POST['rental_name']) && !empty($_POST['rental_price']) && !empty($_POST['rental_description']) && !empty($_POST['rental_category'])) {
    $name = strip_tags($_POST['rental_name']);
    $description = strip_tags($_POST['rental_description']);
    $price = intval(strip_tags($_POST['rental_price']));
    $category = strip_tags($_POST['rental_category']);
    $user_id = $_SESSION['id'];

    if (is_int($price) && $price > 0) {
        try {
            $sth = $connect->prepare("INSERT INTO rental
            (rental_name,rental_description,rental_price, author, rental_category)
            VALUES
            (:rental_name,:rental_description,:rental_price, :author, :rental_category)");
            $sth->bindValue(':rental_name', $name);
            $sth->bindValue(':rental_description', $description);
            $sth->bindValue(':rental_price', $price);
            $sth->bindValue(':author', $user_id);
            $sth->bindValue(':rental_category', $category);

            $sth->execute();
            echo "Votre article a bien été ajouté";

            header('Location: products.php');
        } catch (PDOException $error) {
            echo 'Erreur: ' . $error->getMessage();
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
                <form action="admin-create-post/php" method="post" runat='server'>
                    <h3>DETAILS OF YOUR RENTAL</h3>
                    <input type="text" name="rental_name" value="" placeholder="Name of your rental">
                    <h3>PHOTO OF YOUR RENTAL</h3>
                    <input type="file" id=''>
                    <h3>DESCRIBE YOUR RENTAL</h3>
                    <select name="rental_category">
                        <label for="category-select">Choose your rental</label>
                        <option value="">--Please choose your rental--</option>
                        <option value="category">Home</option>
                        <option value="category">Apartment</option>
                    <textarea rows="5" id="description" value="" placeholder="Describe your rental"
                        name="rental_description"></textarea>
                    <h3>PRICE</h3>
                    <input type="text" name="rental_price" value="" placeholder="Price (euros)" required>
                    <h3>LOCATION</h3>
                    <input type="text" name="rental_adress" value="" placeholder="Adress">
                    <h3>SQUARE METER</h3>
                    <input type="number" id="square-meter" name="square_meter" placeholder="square meter">
                </form>
                <div>
                    <button class="btn-create" name="rental_submit">CREATE</button>
                    <a class="btn-return" href="#">RETURN</a>
                </div>
            </div>
        </div>
        </div>
    </section>

    <?php require 'inc/footer.php' ?>
    