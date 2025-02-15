<?php
namespace App;

require_once "../repository/PaysRepository.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"] ?? null;

    if ($action === "add") {
        $pays = new Pays();
        $pays->setNom($_POST["nom"]);

        addPays($pays);
    } elseif ($action === "update") {
        $pays = getPaysId((int)$_POST["id"]);
        if ($pays) {
            $pays->setNom($_POST["nom"]);

            updatePays($pays);
        }
    } elseif ($action === "delete") {
        removePays(getPaysId((int)$_POST["id"]));
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["id"])) {
        echo json_encode(getPaysId((int)$_GET["id"]));
    } else {
        echo json_encode(getPays());
    }
}
?>
