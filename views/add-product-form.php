<?php require_once __DIR__ . '/inicio.php';?>

<div class="container">

<form action="/add-product" method="POST">

    <label for="fname">Nome do Produto</label><br>
    <input type="text" id="product-title" name="name" class="forms"><br>

    <label for="fname">Descrição do Produto</label><br>
    <input type="text" id="product-title" name="description" class="forms"><br>

    <label for="fname">Preço</label><br>
    <input type="text" id="product-title" name="price" class="forms"><br>

    <label for="fname">Categoria</label><br>
    <input type="text" id="product-title" name="category" class="forms"><br>

    <label for="fname">Quantidade em Estoque</label><br>
    <input type="number" id="product-title" name="qntStock" class="forms"><br>

    <input type="reset" value="Reset">
    <input type="submit" value="Submit">

</form>

</div>

<?php require_once __DIR__ . '/fim.php'; 