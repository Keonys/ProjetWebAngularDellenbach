<?php
// show_product.php <id>
require_once "bootstrap.php";

$id = $argv[1];
$product = $entityManager->find('Product', $id);

if ($product === null) {
    echo "J'ai rien trouvéééé.\n";
    exit(1);
}

echo sprintf("-%s\n", $product->getName());
?>