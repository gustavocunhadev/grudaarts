<?php require_once __DIR__ . '/inicio.php';
/** @var \Grudaarts\Mvc\Entity\Announcement[] $announcementList */
/** @var \Grudaarts\Mvc\Entity\Announcement $announcement */
?>

<div class="container">

<form action="/update-announcement" method="POST">

<label for="fname">Produto</label><br>
    <input list="products" value="<?= $announcement->getProduct()->getId() ?>" name="idProduct" class="forms"><br>
        <datalist id="products">

            <?php foreach ($announcementList as $announcement): ?>
                <option placeholder="<?= $announcement->getProduct()->getName() ?>" value="<?= $announcement->getProduct()->getId()?>">
            <?php endforeach; ?>

        </datalist>


    <input type="number" id="product-title" name="idAnuncio" value="<?= $announcement->getIdAnuncio()?>" class="forms"><br>
        

    <label for="fname">Título do Anúncio</label><br>
    <input type="text" value="<?= $announcement->getTitle() ?>" id="product-title" name="title" class="forms"><br>

    <label for="fname">Descrição do Anúncio</label><br>
    <input type="text" value="<?= $announcement->getDescription() ?>" id="product-title" name="description" class="forms"><br>

    <label for="fname">Preço Promocional</label><br>
    <input type="text" value="<?= $announcement->getPromocionalPrice() ?>" id="product-title" name="promocionalPrice" class="forms"><br>

    <input type="radio" id="ativo" name="status" value=1 <?php if ($announcement->getStatus() == true) { echo 'checked'; } ?> >
    <label for="ativo">Ativo</label><br>
    <input type="radio" id="inativo" name="status" value=0 <?php if ($announcement->getStatus() == false) { echo 'checked'; } ?> >
    <label for="inativo">Inativo</label><br>

    <input type="reset" value="Reset">
    <input type="submit" value="Submit">

</form>

</div>

<?php require_once __DIR__ . '/fim.php'; 