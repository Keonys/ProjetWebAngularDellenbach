<?php
// list_products.php
require_once "bootstrap.php";

global $entityManager;

$productRepository = $entityManager->getRepository('Product');
$products = $productRepository->findAll();

$tab = array();
foreach ($products as $product) {
   $tab[] = array("id"  => $product->getId(),
                  "name" => $product->getName(),
                  "description" => $product->getDescription(),
                  "price" => $product->getPrix(),
				  "image" => $product->getImage()
                );
}

echo (json_encode($tab));
?>