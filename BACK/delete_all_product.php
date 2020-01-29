<?php
require_once "bootstrap.php";

$id = $argv[1];
$product = $entityManager->find('Product', $id);

if ($product === null) {
    echo "Le produit $id n'existe pas fréro.\n";
    exit(1);
}

$entityManager->remove($product);
$entityManager->flush();
?>