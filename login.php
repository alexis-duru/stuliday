<?php require 'inc/header.php' ?>


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

                <?php echo $alert ? "<div class='alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>
                    <form action="#" method="POST" class="login-sign-in">
                        <div id="box-formulaire">
                            <p>EMAIL</p>
                            <input class="login-input-form" type="email" placeholder="" aria-describedby="emailHelp" name="email_login" required>
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
