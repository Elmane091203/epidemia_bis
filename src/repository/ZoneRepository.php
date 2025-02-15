<?php

use App\Zone;

require_once "C:/xampp/htdocs/epidemia_bis/vendor/bootstrap.php";

function addZone($zone) {
    global $entityManager;
    $entityManager->persist($zone);
    $entityManager->flush();
    return $zone->getId();
}

function getZone($id) {
    global $entityManager;
    $zone = $entityManager->getRepository(Zone::class)->find($id);
    return $zone;
}

function updateZone($zone) {
    global $entityManager;

    $zone1 = getZone($zone->getId());
    if (!$zone) {
        $zone1->updateFrom($zone);
    }
    $entityManager->flush();
}

function deleteZone($id) {
    global $entityManager;
    $zone = getZone($id);
    if ($zone) {
        $entityManager->remove($zone);
        $entityManager->flush();
    }
}
function getZones(){
    global $entityManager;
    $zones = $entityManager->getRepository(Zone::class)->findAll();
    return $zones;
}
?>