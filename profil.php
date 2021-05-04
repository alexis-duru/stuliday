<?php require 'inc/header.php';

?>

    <section id="header-banner">
        <div id="header-banner-container">
            <div>
                <h2>BIENVENUE<?php echo $user['username']; ?></h2>
            </div>
        </div>
    </section>

    <section id="section-profil">
        <div id="section-profil-container">
            <div id="container-rental-item">
                <div class="rental-item">
                    <div>
                        
                        <a class="btn-manage" href="manage.php">MANAGE</a>
                        <a class="btn-addnew" href="addnew.php">ADD NEW</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require 'inc/footer.php' ?>
