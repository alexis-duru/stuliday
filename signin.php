<?php require 'inc/header.php' ?>

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
                <form action="" method="POST" class="sign-in">
                    <div id="signin-box-formulaire">
                        <p>EMAIL</p>
                        <input class="signin-input-form" type="email" placeholder="">
                    </div>

                    <div id="signin-box-formulaire">
                        <p>USERNAME</p>
                        <input class="signin-input-form" type="text" placeholder="">
                    </div>

                    <div id="password">
                        <p>CHOOSE A PASSWORD</p>
                        <input class="signin-input-form" type="password" placeholder="">
                    </div>

                    <div id="password">
                        <p>ENTER YOUR PASSWORD AGAIN</p>
                        <input class="signin-input-form" type="password" placeholder="">
                    </div>

                    <div id="cgu">
                        <input class="input-form" type="checkbox" placeholder="">
                        <p>Accept the <a id="cgu-link" href='#'>terms and conditions</a></p>
                    </div>
                    <div id="btn-contact">
                        <a href="index.php">REGISTER NOW</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php require 'inc/footer.php' ?>
