<?php
namespace App;

require_once "../repository/PointRepository.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"] ?? null;

    if ($action === "add") {
        $point = new Point();
        $point->setNom($_POST["nom"]);
        $point->setZone(getZone((int)$_POST["zone_id"]));

        addPoint($point);
    } elseif ($action === "update") {
        $point = getPoint((int)$_POST["id"]);
        if ($point) {
            $point->setNom($_POST["nom"]);
            $point->setZone(getZone((int)$_POST["zone_id"]));

            updatePoint($point);
        }
    } elseif ($action === "delete") {
        deletePoint((int)$_POST["id"]);
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["id"])) {
        echo json_encode(getPoint((int)$_GET["id"]));
    } else {
        echo json_encode(getPoints());
    }
}
?>
