<?php require 'inc/header.php' ?>
<?php

$user_id = $_SESSION['id'];
// 
$sqlRentals = "SELECT r.*, u.username, c.categories_name FROM rentals AS r LEFT JOIN users AS u ON r.author = u.id LEFT JOIN categories AS c ON r.rental_category = c.categories_id WHERE author = {$user_id}";
$rentals = $connect->query($sqlRentals)->fetchAll(PDO::FETCH_ASSOC);
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
            foreach ($rentals as $rental) {
            ?>
                <div class="rental">
                    <img src="assets/img/image/home/3.jpg">
                    <div>
                        <h3><?php echo $rental['rental_name']; ?></h3>
                        <p><?php echo $rental['rental_description']; ?></p>
                        <div class="price">
                            <p class="amount"><?php echo $rental['rental_price']; ?>$</p>
                            <p> / </p>
                            <h4>NIGHT</h4>
                        </div>

                        <div id="btn-details-rental">
                        <p><a href="rental-details.php?id=<?php echo $rental['rental_id']; ?>" >details</a></p>
                        <p><a href="edit.php?rental_id=<?php echo $rental['rental_id']; ?>" >edit</a></p>
                        </div>
                        

                        
                        <p><?php echo $rental['categories_name']; ?></p>
                        <p><?php echo $rental['created_at']; ?></p>
                        <img id="etoile" src="assets/img/icones/star.png">
                        <img id="etoile" src="assets/img/icones/star.png">
                        <img id="etoile" src="assets/img/icones/star.png">
                        <img id="etoile" src="assets/img/icones/star.png">
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </section>

    <?php require 'inc/footer.php' ?>
