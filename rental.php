<?php require 'inc/header.php';
// $title = 'Rental - Le Chouette Coin';


// $sql = 'SELECT * FROM categories';
// $res = $conn->query($sql);
// $categories = $res->fetchAll();

// if (isset($_POST['search_form'])) {
//     $category = intval(strip_tags($_POST['rental_category']));
//     $search_text = strip_tags($_POST['search_text']);

//     $sql2 = "SELECT * FROM rentals WHERE rental_category LIKE '%{$category}%' AND rental_name LIKE '%{$search_text}%'";
//     $res2 = $conn->query($sql2);
//     $search = $res2->fetchAll();
// }
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

                        <div id="btn-details-rental">
                            <p><a href="rental-details.php">details</a></p>
                        </div>
                        <img id="etoile" src="assets/img/icones/star.png">
                        <img id="etoile" src="assets/img/icones/star.png">
                        <img id="etoile" src="assets/img/icones/star.png">
                        <img id="etoile" src="assets/img/icones/star.png">
                    </div>
                </div>

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
