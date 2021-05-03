<?php require 'inc/config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=3">
    <link href="Assets/css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/icones/stuliday-fav.png">
    <title>STULIDAY</title>
</head>

<body>
    <header>
        <nav>
            <h1>
                <a href='index.php'>STULIDAY</a>
            </h1>
            <ul>
                <li>
                    <a href="index.php">HOME</a>
                </li>
                <li>
                    <a href="rental.php">RENTAL</a>
                </li>
                <?php if(!empty($_SESSION['username'])) { ?>
                <li>
                    <a href="profil.php">PROFIL</a>
                </li>
                <li>
                    <a href="?logout">DISCONNECT</a>
                </li>
                <?php }else{ ?>
                <li>
                        <a href="login.php">SIGN IN / SIGN UP</a>
                </li>
                <?php } ?>
            </ul>
        </nav>
    </header>