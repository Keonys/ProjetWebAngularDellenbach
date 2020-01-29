<?php
// update_product.php <id> <new-name>
require_once "bootstrap.php";

$id = $argv[1];
$newName = $argv[2];
$newDescription = $argv[3];
$newPrix = $argv[4];
$newImage = $argv[5];

$product = $entityManager->find('Product', $id);

if ($product === null) {
    echo "Le produit $id n'existe pas fréro.\n";
    exit(1);
}

$product->setName($newName);
$product->setDescription($newDescription);
$product->setPrix($newPrix);
$product->setImage($newImage);

$entityManager->flush();
?>