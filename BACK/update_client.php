<?php
// update_client.php <id> <new-name>
require_once "bootstrap.php";

$id = $argv[1];
$newName = $argv[2];
$newFirstname = $argv[3];
$newAdress = $argv[4];
$newCp = $argv[5];
$newVille = $argv[5];
$newTel = $argv[6];
$newEmail = $argv[7];
$newCivilite = $argv[8];
$newLogin = $argv[9];
$newPassword = $argv[10];
$newPasswordVerif = $argv[11];

$client = $entityManager->find('Client', $id);

if ($client === null) {
    echo "Le client $id n'existe pas fréro.\n";
    exit(1);
}

$client->setName($newName);
$client->setFirstname($newFirstname);
$client->setAdress($newAdress);
$client->setCp($newCp);
$client->setVille($newVille);
$client->setTel($newTel);
$client->setEmail($newEmail);
$client->setCivilite($newCivilite);
$client->setLogin($newLogin);
$client->setPassword($newPassword);
$client->setPasswordVerif($newPasswordVerif);

$entityManager->flush();
?>