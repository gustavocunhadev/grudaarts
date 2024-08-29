<?php require_once __DIR__ . '/inicio.php';
/** @var \Grudaarts\Mvc\Entity\Announcement[] $announcementList */
?>

<div class="container">

<form action="/add-announcement" method="POST">

    <label for="fname">Produto</label><br>
    <input list="products" name="product" class="forms"><br>
        <datalist id="products">

            <?php foreach ($announcementList as $announcement): ?>
                <option value="<?= $announcement->getProduct()->getName() ?>">
                <?php endforeach; ?>

        </datalist>

        <?php foreach ($announcementList as $announcement): ?>
            <input type="number" id="product-title" name="id" value="<?= $announcement->getProduct()->getId()?>" class="forms"><br>
        <?php endforeach; ?>

    <label for="fname">Título do Anúncio</label><br>
    <input type="text" id="product-title" name="title" class="forms"><br>

    <label for="fname">Descrição do Anúncio</label><br>
    <input type="text" id="product-title" name="description" class="forms"><br>

    <label for="fname">Preço Promocional</label><br>
    <input type="text" id="product-title" name="promocionalPrice" class="forms"><br>

    <input type="radio" id="ativo" name="status" value=1>
    <label for="ativo">Ativo</label><br>
    <input type="radio" id="inativo" name="status" value=1>
    <label for="inativo">Inativo</label><br>

    <input type="reset" value="Reset">
    <input type="submit" value="Submit">

</form>

</div>

<?php require_once __DIR__ . '/fim.php'; 