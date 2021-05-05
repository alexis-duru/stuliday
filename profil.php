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
                <h2>BIENVENUE <?php echo $user['username']; ?></h2>
                <p>Vous possédez le role <?php echo $user['role']; ?></p>
            </div>
        </div>
    </section>

    <section id="section-profil">
        <div id="section-profil-container">
            <div id="container-rental-item">
                <div class="rental-item">
                    <div>
                        <button type="button" class="btn-manage" href="manage.php">MANAGE</a>
                    </div>
                    <div>
                    <a class="btn-addnew" href="addnew.php">ADD NEW</a>
                    <div class="open-admin">
                    <?php
                    if ($user['role'] === 'ROLE_ADMIN') {
                        echo '<a href="admin.php"> Accéder à l\'espace administrateur </a>';
                    }
                    ?>
                    </div>
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
        <p>Vous ne pouvez pas accéder à votre profil sans vous connecter</p>
        <p>
            <a href="login.php">Se connecter</a>
        </p>
    </div>

<?php
}
?>

<?php require 'inc/footer.php' ?>
