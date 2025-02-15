<?php
namespace App;
require_once "../../vendor/bootstrap.php";

function addPoint(Point $point) {
    global $entityManager;
    $entityManager->persist($point);
    $entityManager->flush();
    return $point->getId();
}

function getPoint($id) {
    global $entityManager;
    return $entityManager->getRepository(Point::class)->find($id);
}

function updatePoint(Point $point) {
    global $entityManager;

    $existingPoint = getPoint($point->getId());
    if ($existingPoint) {
        $existingPoint->setNom($point->getNom());
        $existingPoint->setZone($point->getZone());
        $entityManager->flush();
    }
}

function deletePoint($id) {
    global $entityManager;
    $point = getPoint($id);
    if ($point) {
        $entityManager->remove($point);
        $entityManager->flush();
    }
}

function getPoints() {
    global $entityManager;
    return $entityManager->getRepository(Point::class)->findAll();
}
?>
