<?php
namespace App;

require_once "../repository/UserRepository.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"] ?? null;

    if ($action === "add") {
        $user = new User();
        $user->setNomPrenom($_POST["nom_prenom"]);
        $user->setLogin($_POST["login"]);
        $user->setMdp(password_hash($_POST["mdp"], PASSWORD_BCRYPT));
        $user->setRole($_POST["role"]);

        addUser($user);
    } elseif ($action === "update") {
        $user = getUser((int)$_POST["id"]);
        if ($user) {
            $user->setNomPrenom($_POST["nom_prenom"]);
            $user->setLogin($_POST["login"]);
            $user->setMdp(password_hash($_POST["mdp"], PASSWORD_BCRYPT));
            $user->setRole($_POST["role"]);

            updateUser($user);
        }
    } elseif ($action === "delete") {
        deleteUser((int)$_POST["id"]);
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["id"])) {
        echo json_encode(getUser((int)$_GET["id"]));
    } else {
        echo json_encode(getUsers());
    }
}
?>
