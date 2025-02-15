<?php

use App\Pays;

require_once "C:/xampp/htdocs/epidemia_bis/vendor/bootstrap.php";
function addPays(Pays $pays)
{
    global $entityManager;
    $entityManager->persist($pays);
    $entityManager->flush();
}
function removePays(Pays $pays)
{
    global $entityManager;
    $entityManager->remove($pays);
    $entityManager->flush();
}
function updatePays(Pays $pays)
{
    global $entityManager;
    $p = getPaysId($pays->getId());
    if (!$p) {
        throw new \Exception("Pays non trouve");
    }else {
        $p->setNom($pays->getNom());
        
    }
    $entityManager->flush();
}
function getPays() {
    global $entityManager;
    return $entityManager->getRepository(Pays::class)->findAll();
}
function getPaysId($id){
    global $entityManager;
    return $entityManager->getRepository(Pays::class)->find($id);
}
