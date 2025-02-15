<?php
namespace App;

require_once "../repository/PaysRepository.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"] ?? null;

    if ($action === "add") {
        $pays = new Pays();
        $pays->setNom($_POST["nom"]);

        addPays($pays);
        echo json_encode($pays->toJson(), JSON_PRETTY_PRINT);
    } elseif ($action === "update") {
        $pays = getPaysId((int)$_POST["id"]);
        if ($pays) {
            $pays->setNom($_POST["nom"]);

            updatePays($pays);
            echo json_encode($pays->toJson(), JSON_PRETTY_PRINT);
        }
    } elseif ($action === "delete") {
        removePays(getPaysId((int)$_POST["id"]));
        echo json_encode(true);
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["id"])) {
        echo json_encode(getPaysId((int)$_GET["id"]));
    } else {
        $paysList = getPays();
        echo json_encode(array_map(fn($pays) => $pays->toJson(), $paysList),JSON_PRETTY_PRINT);
    }
}
?>
