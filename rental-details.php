<?php require 'inc/header.php'; ?>

<?php


$id = $_GET['id'];

$sqlRentals = "SELECT r.*, u.username, c.categories_name FROM rentals AS r LEFT JOIN users AS u ON r.author = u.id LEFT JOIN categories AS c ON r .rental_category = c.categories_id WHERE r.rental_id = {$id} ";

$rentals = $connect->query($sqlRentals)->fetch(PDO::FETCH_ASSOC);
?>
    <section id="header-banner">
        <div id="header-banner-container">
            <div>
                <h2>RENTAL DETAILS</h2>
            </div>
        </div>
    </section>

    <section id="section-rental-details">
        <div id="container-in-rental-details">
            <div id="container-in-1">
                <img src="assets/img/image/home/3.jpg">
            </div>
            <div id="container-in-2">
                <div>
                    <h2><?php echo $rentals['rental_name']; ?></h2>
                    <div class="price">
                        <p class="amount"><?php echo $rentals['rental_price']; ?>$</p>
                        <p> / </p>
                        <h4>NIGHT</h4>
                    </div>
                </div>
                <span></span>
                <p>Category : <?php echo $rentals['categories_name']; ?></p>
                <span></span>
                <p><?php echo $rentals['rental_description']; ?></p>
            </div>
            <div id="container-in-3">
                <span></span>
                <img src="assets/img/image/details-rental-2.jpeg">
            </div>
            
            <div id="container-in-4">
                <span></span>
                <button>BOOK</button>
            </div>
            <span></span>
                <p>Published on: <?php echo $rentals['created_at']; ?>
            </p>
            
        </div>
    </section>

    <?php require 'inc/footer.php' ?>
