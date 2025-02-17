<?php

namespace App;

require_once "../repository/ZoneRepository.php";
require_once "../repository/PaysRepository.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"] ?? null;
    if ($action === "add") {
        $pointsNoms = $_POST["point_nom"] ?? [];
        

        $zone = new Zone();
        $zone->setNom($_POST["nom"]);
        $zone->setStatut($_POST["statut"]);
        $zone->setNbHabitants((int)$_POST["nb_habitants"]);
        $zone->setNbSymptomatiques((int)$_POST["nb_symptomatiques"]);
        $zone->setNbPositifs((int)$_POST["nb_positifs"]);
        $zone->setPays(getPaysId((int)$_POST["pays_id"]));

        foreach ($pointsNoms as $pointNom) {
            if (!empty(trim($pointNom))) {
                $point = new Point();
                $point->setNom($pointNom);
                $zone->setPoints($point);
            }
        }

        addZone($zone);
        echo json_encode(["message" => "Zone ajoutée avec succès"]);
    } elseif ($action === "update") {
        $zone = getZone((int)$_POST["id"]);
        if ($zone) {
            $zone->setNom($_POST["nom"]);
            $zone->setStatut($_POST["statut"]);
            $zone->setNbHabitants((int)$_POST["nb_habitants"]);
            $zone->setNbSymptomatiques((int)$_POST["nb_symptomatiques"]);
            $zone->setNbPositifs((int)$_POST["nb_positifs"]);
            $zone->setPays(getPaysId((int)$_POST["pays_id"]));

            updateZone($zone);
        }
    } elseif ($action === "delete") {
        deleteZone((int)$_POST["id"]);
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["id"])) {
        echo json_encode(getZone((int)$_GET["id"])->toJson());
    } else {
        $zones = getZones();

        echo json_encode(array_map(fn($zone) => $zone->toJson(), $zones),JSON_PRETTY_PRINT);
    }
}
