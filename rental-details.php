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

    

    <section id="rental-container">
        <div id="container-in">
            <div class="rental">

                <?php if (is_null($rentals['image']) || empty($rentals['image'])) {
                            echo "<img src='./public/uploads/noImg.png' alt='rental_image' width='200'/> ";
                            } else {
                            ?>
                                <img src="./public/uploads/<?php echo $rentals['image']; ?>" alt='<?php echo $rentals['rental_name']; ?>' width='200' />
                            <?php
                            }
                            ?>
                <div>
                    <h2><?php echo $rentals['rental_name']; ?></h2>
                        <div class="price">
                            <p class="amount"><?php echo $rentals['rental_price']; ?>$</p>
                            <p> / </p>
                            <h4>NIGHT</h4>
                        </div>
                    <span></span>
                    <p>Category : <?php echo $rentals['categories_name']; ?></p>
                    <span></span>
                    <p><?php echo $rentals['rental_description']; ?></p>
                    <span></span>
                    <img src="assets/img/image/details-rental-2.jpeg">
                    <span></span>
                    <button>BOOK</button>
                    <span></span>
                    <p>Published on: <?php echo $rentals['created_at']; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <?php require 'inc/footer.php' ?>
