<?php require 'inc/header.php'; ?>
<?php

if (!empty($_SESSION)) {
    $admin_id = $_SESSION['id'];
    $sqlAdmin = "SELECT * FROM users WHERE id = '{$admin_id}' AND role = 'ROLE_ADMIN'";
    $resultAdmin = $connect->query($sqlAdmin);
    if ($admin = $resultAdmin->fetch(PDO::FETCH_ASSOC)) {
        $sqlUsers = "SELECT * FROM users WHERE id != '{$admin_id}'";
        $users = $connect->query($sqlUsers)->fetchAll(PDO::FETCH_ASSOC);
?>


<section id="header-banner">
        <div id="header-banner-container">
            <div>
                <h2>ADMIN AREA</h2>
            </div>
        </div>
    </section>


<section class="admin-section">
        <div id="admin-container">
        <h3>USER ACCOUNT</H3>
            <table class="table-admin">
                <thead>
                    <tr>
                        <th scope="col"># id</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //? On crée une boucle sur la table users, qui permet d'afficher les infos de tous les utilisateurs
                    foreach ($users as $user) {
                    ?>
                        <tr>
                            <th><?php echo $user['id'] ?></th>
                            <td><?php echo $user['username'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><?php echo $user['role'] ?></td>
                            <td>Modifier</td>
                            <td>
                                <form action="delete.php" method="post">
                                    <input class="input-delete" type="hidden" name="csrf_token" value="<?php echo $token; ?>">
                                    <input class="input-delete" type="hidden" name="id" value="<?php echo $user['id'] ?>">
                                    <input class="input-delete" type="submit" value="delete" name="delete">
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
            
</section>

<?php
    } else {
        // echo "Vous ne possédez pas les droits pour accéder à cette page";
        echo "Cette page n'existe pas";
        echo "<a class='btn btn-light' href='index.php'>Retourner à la page d'accueil</a>";
    }
} else {
    // echo "Vous ne possédez pas les droits pour accéder à cette page";
    echo "Cette page n'existe pas";
    echo "<a class='btn btn-light' href='index.php'>Retourner à la page d'accueil</a>";
}
?>

<?php require 'inc/footer.php'; ?>