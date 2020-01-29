<?php
// create_client.php <name>
require_once "bootstrap.php";

$newClientName = $argv[1];
$newClientFirstname = $argv[2];
$newClientAdress = $argv[3];
$newClientCp = $argv[4];
$newClientVille = $argv[5];
$newClientTel = $argv[6];
$newClientEmail = $argv[7];
$newClientCivilite = $argv[8];
$newClientLogin = $argv[9];
$newClientPassword = $argv[10];
$newClientPasswordVerif = $argv[11];

$client = new Client();
$client->setName($newClientName);
$client->setFirstname($newClientFirstname);
$client->setAdress($newClientAdress);
$client->setCp($newClientCp);
$client->setVille($newClientVille);
$client->setTel($newClientTel);
$client->setEmail($newClientEmail);
$client->setCivilite($newClientCivilite);
$client->setLogin($newClientLogin);
$client->setPassword($newClientPassword);
$client->setPasswordVerif($newClientPasswordVerif);

$entityManager->persist($client);
$entityManager->flush();

echo "Client OK ! Id -> " . $client->getId() . "\n";
?>