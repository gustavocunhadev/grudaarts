<?php require_once __DIR__ . '/inicio.php'; 
/** @var \Grudaarts\Mvc\Entity\Announcement[] $announcementList */
?>

<div class="announcement-list">
    <ul>
        <?php foreach ($announcementList as $announcement): ?>   
        <div class="announcement-block-container">
                <img src="/../public/img/imagem-10.webp" class="announcement-block-img"></img>
                    <div class="announcement-block-info">
                        <h3 class="announcement-block-category"><?= $announcement->getProduct()->getCategory() ?></h3>
                        <h2 class="announcement-block-title"><?= $announcement->getTitle() ?></h2>
                        <p class="announcement-block-starts">Avaliações</p>
                        <h4 class="announcement-block-price">R$<?= $announcement->getPromocionalPrice() ?></h4>
                    </div>
            </div>
        <?php endforeach; ?>
    </ul>
   
</div>

<?php require_once __DIR__ . '/fim.php'; ?>
