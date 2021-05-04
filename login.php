<?php require 'inc/header.php' ?>
<?php
$alert = false;

//? Etape 1 : Vérification du remplissage du formulaire
if (!empty($_POST['email_login']) && !empty($_POST['password_login']) && isset($_POST['submit_login'])) {
    //? Etape 2 : Initialisation des variables + assainissement via htmlspecialchars
    $email = htmlspecialchars($_POST['email_login']);
    $password = htmlspecialchars($_POST['password_login']);
    // var_dump($password);
    try {
        $sqlMail = "SELECT * FROM users WHERE email = '{$email}'";
        $resultMail = $connect->query($sqlMail);
        $user = $resultMail->fetch(PDO::FETCH_ASSOC);
        // var_dump($user);
        if ($user) {
            $dbpassword = $user['password'];
            if (password_verify($password, $dbpassword)) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['username'] = $user['username'];

                $alert = true;
                $type = 'success';
                $message = "Vous êtes désormais connectés";
                unset($_POST);
                header('Location: profil.php');
            } else {
                $alert = true;
                $type = 'danger';
                $message = "Le mot de passe est erroné";
                unset($_POST);
            }
        } else {
            $alert = true;
            $type = 'warning';
            $message = "Ce compte n'existe pas";
            unset($_POST);
        }
    } catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}

/**
 * ! Etapes logiques de la connexion :
 * 
 * TODO : Vérif intro
 * 
 * TODO : Vérification de l'email
 * 
 * TODO : Vérification du mot de passe associé à l'email
 * 
 * TODO : Connexion via création d'une session
 * 
 * TODO : Messages d'erreur
 */

?>
    <section id="header-banner">
        <div id="header-banner-container">
            <div>
                <h2>SIGN UP</h2>
    
            </div>
        </div>
    </section>

    <section id="login-section">
        <div id="login-container">
            <div id="login-container-in">
                <div id="login-formulaire-container">

<!-- //? Système d'alerte qui dépend de 3 variables, $alert pour s'afficher, $type pour le choix de la couleur, $message pour le contenu du message d'alerte -->
                <?php echo $alert ? "<div class='alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>
                    <form action="#" method="POST" class="login-sign-in">
                        <div id="box-formulaire">
                            <p>EMAIL</p>
                            <input class="login-input-form" type="email" placeholder="" name="email_login" required>
                        </div>
                        <div id="password">
                            <p>PASSWORD</p>
                            <input class="login-input-form" type="password" placeholder="" name="password_login" required>
                        </div>
                        <div id="btn-contact">
                            <button class="submit-btn" type='submit' href="" name="submit_login" value="connexion">LOGIN</button>
                        </div>
                    </form>
                </div>
                <div id="login-inscription-utilisateur">
                    <p>If you do not yet have an account, you may : <a href='signin.php'>register here</a></p>
                </div>
            </div>
        </div>
    </section>

    <?php require 'inc/footer.php' ?>
