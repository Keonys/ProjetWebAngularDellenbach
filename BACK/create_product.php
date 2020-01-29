<?php
// create_product.php <name>
require_once "bootstrap.php";

$newProductName = $argv[1];
$newProductDescription = $argv[2];
$newProductPrix = $argv[3];
$newProductImage = $argv[4];

$product = new Product();
$product->setName($newProductName);
$product->setDescription($newProductDescription);
$product->setPrix($newProductPrix);
$product->setImage($newProductImage);

$entityManager->persist($product);
$entityManager->flush();

echo "Produit OK ! Id -> " . $product->getId() . "\n";
?>