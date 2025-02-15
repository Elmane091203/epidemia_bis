<?php

use App\User;

require_once "C:/xampp/htdocs/epidemia_bis/vendor/bootstrap.php";

function addUser(User $user) {
    global $entityManager;
    $entityManager->persist($user);
    $entityManager->flush();
    return $user->getId();
}

function getUser($id) {
    global $entityManager;
    return $entityManager->getRepository(User::class)->find($id);
}

function updateUser(User $user) {
    global $entityManager;

    $existingUser = getUser($user->getId());
    if ($existingUser) {
        $existingUser->setNomPrenom($user->getNomPrenom());
        $existingUser->setLogin($user->getLogin());
        $existingUser->setMdp($user->getMdp());
        $existingUser->setRole($user->getRole());
        $entityManager->flush();
    }
}

function deleteUser($id) {
    global $entityManager;
    $user = getUser($id);
    if ($user) {
        $entityManager->remove($user);
        $entityManager->flush();
    }
}

function getUsers() {
    global $entityManager;
    return $entityManager->getRepository(User::class)->findAll();
}
?>
