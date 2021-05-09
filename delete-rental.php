<?php require 'inc/header.php';
$id = $_POST['id'];
$token = $_POST['csrf_token'];

var_dump($_POST);
if (isset($_POST['delete']) && $_POST['csrf_token'] == $token) {
    try {
        $sth = $connect->prepare("DELETE FROM rentals WHERE rental_id =:id");
        $sth->bindValue(':id', $id);

        $result = $sth->execute();
        if ($result) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            echo "Il ya eu un problème avec votre requête, contactez le support";
        }
    } catch (PDOException $error) {
        echo 'Erreur: ' . $error->getMessage();
    }
}
?>