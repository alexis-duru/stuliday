<?php require 'inc/header.php' ?>
<?php
var_dump($_POST);
if (!empty($_POST['email_signup']) && !empty($_POST['password1_signup']) && !empty($_POST['password2_signup']) && !empty($_POST['username_signup']) &&  isset($_POST['submit_signup'])) {
    $email = htmlspecialchars($_POST['email_signup']);
    $password1 = htmlspecialchars($_POST['password1_signup']);
    $password2 = htmlspecialchars($_POST['password2_signup']);
    $username = htmlspecialchars($_POST['username_signup']);

    try {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sqlMail = "SELECT * FROM users WHERE email = '{$email}'";
            $resultMail = $connect->query($sqlMail);
            $countMail = $resultMail->fetchColumn();
            if (!$countMail) {
                $sqlUsername = "SELECT * FROM users WHERE username = '{$username}'";
                $resultUsername = $connect->query($sqlUsername);
                $countUsername = $resultUsername->fetchColumn();
                if (!$countUsername) {
                    if ($password1 === $password2) {
                        $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
                        $sth = $connect->prepare("INSERT INTO users (email,username,password) VALUES (:email,:username,:password)");
                        $sth->bindValue(':email', $email);
                        $sth->bindValue(':username', $username);
                        $sth->bindValue(':password', $hashedPassword);
                        $sth->execute();
                        echo "L'utilisateur a bien été enregistré !";
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
