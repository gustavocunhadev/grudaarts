<?php require_once __DIR__ . '/inicio.php';
/** @var \Grudaarts\Mvc\Entity\Product $product */
?>

<div class="container">

<form action="/update-product" method="POST">

    <label for="fname">Nome do Produto</label><br>
    <input type="text" value="<?= $product->getName() ?>" id="product-title" name="name" class="forms"><br>

    <label for="fname">Descrição do Produto</label><br>
    <input type="text" value="<?= $product->getDescription() ?>" id="product-title" name="description" class="forms"><br>

    <label for="fname">Preço</label><br>
    <input type="text" value="<?= $product->getPrice() ?>" id="product-title" name="price" class="forms"><br>

    <label for="fname">Categoria</label><br>
    <input type="text" value="<?= $product->getCategory() ?>" id="product-title" name="category" class="forms"><br>

    <label for="fname">Quantidade em Estoque</label><br>
    <input type="number" value="<?= $product->getQntStock() ?>" id="product-title" name="qntStock" class="forms"><br>

    <input type="number" value="<?= $product->getId() ?>" id="product-title" name="id" class="forms">

    <input type="reset" value="Reset">
    <input type="submit" value="Submit">

</form>

</div>

<?php require_once __DIR__ . '/fim.php'; 