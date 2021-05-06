<?php $page = 'Profile'; ?>
<?php require 'inc/header.php'?>

<?php

if (!empty($_SESSION)) {

    $user_id = $_SESSION['id'];
    $sqlUser = "SELECT * FROM users WHERE id = '{$user_id}'";
    $resultUser = $connect->query($sqlUser);
    if ($user = $resultUser->fetch(PDO::FETCH_ASSOC)) {
?>

    <section id="header-banner">
        <div id="header-banner-container">
            <div>
                <h2>WELCOME <?php echo $user['username']; ?></h2>
                <!-- <p>You own the role <?php echo $user['role']; ?></p> -->
            </div>
        </div>
    </section>

    <section id="section-profil">
        <div id="section-profil-container">
            <div id="container-rental-item">
                <div class="rental-item">
                    <div>
                        <a type="button" class="btn-profil" href="manage.php">MY RENTALS</a>
                    </div>

                    <div>
                        <a class="btn-profil" href="addnew.php">ADD NEW RENTALS</a>
                    </div>

                    <div>
                    <?php
                    if ($user['role'] === 'ROLE_ADMIN') {
                        echo '<div class="btn-profil"><a href="admin.php"> ACCESS OF ADMINISTRATOR AREA <div> </a>';?>
                    <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    } else {
        echo " Erreur de connexion, veuillez vous reconnecter";
        session_destroy();
    }
} else {
    ?>
    <div>
        <p>You cannot access your profile without logging in</p>
        <p>
            <a href="login.php">SIGN-IN</a>
        </p>
    </div>

<?php
}
?>

<?php require 'inc/footer.php' ?>
