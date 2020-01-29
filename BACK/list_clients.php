<?php
// list_clients.php
require_once "bootstrap.php";

global $entityManager;

$clientRepository = $entityManager->getRepository('Client');
$clients = $clientRepository->findAll();

$tab = array();
foreach ($clients as $client) {
   $tab[] = array("id"  => $client->getId(),
                  "name" => $client->getName(),
                  "firstname" => $client->getFirstname(),
                  "adress" => $client->getAdress(),
				  "cp" => $client->getCp(),
				  "ville" => $client->getVille(),
				  "tel" => $client->getTel(),
				  "email" => $client->getEmail(),
				  "civilite" => $client->getCivilite(),
				  "login" => $client->getLogin(),
				  "password" => $client->getPassword(),
				  "passwordVerif" => $client->getPasswordVerif()
                );
}
    echo (json_encode($tab));
?>