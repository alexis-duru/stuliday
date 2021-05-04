<?php require 'inc/header.php' ?>
<?php
var_dump($_POST);
if (!empty($_POST['email_signup']) && !empty($_POST['password1_signup']) && !empty($_POST['password2_signup']) && !empty($_POST['username_signup']) &&  isset($_POST['submit_signup'])) {
    $email = htmlspecialchars($_POST['email_signup']);
    $password1 = htmlspecialchars($_POST['password1_signup']);
    $password2 = htmlspecialchars($_POST['password2_signup']);
    $username = htmlspecialchars($_POST['username_signup']);

    try {
         //? Etape 1 : Ajout d'un filtre pour la validation du format d'email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
             // echo "Etape 1 : Email ok <br>";
            //? Etape 2 : Vérification de la disponibilité de l'email dans la BDD
            $sqlMail = "SELECT * FROM users WHERE email = '{$email}'";
            $resultMail = $connect->query($sqlMail);
            // var_dump($resultMail);
            $countMail = $resultMail->fetchColumn();
            if (!$countMail) {
                // echo "Etape 2 : Email BDD ok <br>";
                //? Etape 3 : Vérification de la disponibilité de l'username dans la BDD
                $sqlUsername = "SELECT * FROM users WHERE username = '{$username}'";
                $resultUsername = $connect->query($sqlUsername);
                $countUsername = $resultUsername->fetchColumn();
                if (!$countUsername) {
                    // echo "Etape 3 : Username BDD ok <br>";
                    //? Etape 4 : Vérification de la concordance des mots de passe
                    if ($password1 === $password2) {
                        // echo "Etape 4 : Concordance Mdp ok <br>";
                        //? Etape 5 : Hashage du mot de passe
                        $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
                         // echo "Etape 5 : Hashage Mdp ok <br>";
                        //? Etape 6 : Enregistrement des données utilisateur
                        $sth = $connect->prepare("INSERT INTO users (email,username,password) VALUES (:email,:username,:password)");
                        $sth->bindValue(':email', $email);
                        $sth->bindValue(':username', $username);
                        $sth->bindValue(':password', $hashedPassword);
                        $sth->execute();
                        echo "L'utilisateur a bien été enregistré !";
                         //? Etape 7 : Ajout de messages d'erreurs adaptés.
                    } else {
                        echo "Les mots de passe ne sont pas concordants.";
                        unset($_POST);
                    }
                } else {
                    echo " Ce nom d'utilisateur existe déja";
                    unset($_POST);
                }
            } else {
                echo "Un compte existe déja pour cette adresse mail";
                unset($_POST);
            }
        } else {
            echo "L'adresse email saisie n'est pas valide";
            unset($_POST);
        }
    } catch (PDOException $error) {
        echo 'Error: ' . $error->getMessage();
    }
}

/**
 * ! Etapes logiques de l'inscription
 * 
 *  TODO Vérification intro
 * 
 *  TODO : Initialisation variables
 * 
 *  TODO Verification email : Nécessaire et intéressant, pas sûr qu'on le mette en place pour l'instant
 * 
 *  TODO Vérification email dans la BDD : Pour que l'email ne soit pas existant
 * 
 *  TODO Vérification username dans la BDD : Pour que l'username ne soit pas existant
 * 
 *  TODO Vérification mdp : Concordance password
 * 
 *  TODO Hashage du mdp : Crypter le mot de passe
 * 
 *  TODO Enregistrement données utilisateur
 * 
 *  TODO Assainissement des variables
 * 
 *  TODO Message d'erreur
 */

// var_dump($email,$password1, $password2, $username);
?>

    <section id="header-banner">
        <div id="header-banner-container">
            <div>
                <h2>SIGN IN</h2>
            </div>
        </div>
    </section>

    <section id="signin-container">
        <div id="signin-container-in">
            <div id="signin-formulaire-container">
                <form action="#" method="POST" class="sign-in">
                    <div id="signin-box-formulaire">
                        <p>EMAIL</p>
                        <input class="signin-input-form" type="email" placeholder="" name="email_signup" required>
                    </div>

                    <div id="signin-box-formulaire">
                        <p>USERNAME</p>
                        <input class="signin-input-form" type="text" placeholder="" name="username_signup" required>
                    </div>

                    <div id="password">
                        <p>CHOOSE A PASSWORD</p>
                        <input class="signin-input-form" type="password" placeholder=""
                        name="password1_signup" required>
                    </div>

                    <div id="password">
                        <p>ENTER YOUR PASSWORD AGAIN</p>
                        <input class="signin-input-form" type="password" placeholder="" name="password2_signup" required>
                    </div>

                    <div id="cgu">
                        <input class="input-form" type="checkbox" placeholder="" required>
                        <p>Accept the <a id="cgu-link" href='#'>terms and conditions</a></p>
                    </div>
                    <div id="btn-contact">
                        <button class="submit-btn" type="submit" name="submit_signup" value="inscription">REGISTER NOW</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php require 'inc/footer.php' ?>
