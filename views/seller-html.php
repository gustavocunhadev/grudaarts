<?php require_once __DIR__ . '/inicio.php'; 
/** @var \Grudaarts\Mvc\Entity\Announcement[] $announcementList */
?>

<div class="container">

<title>Painel do Vendedor</title>

<button>Adicionar Anúncio</button>

<?php foreach ($announcementList as $announcement): ?>

    <span><?= $announcement->getTitle() ?></span>

<div class="acoes_anuncios">
    <a href="/delete-announcement?id=<?= $announcement->getIdAnuncio(); ?>" class="delete_button" >Delete</a>
    <a href="/update-announcement?id=<?= $announcement->getIdAnuncio(); ?>" class="update_button">Atualizar</a>
</div>

<?php endforeach; ?>
</div>
<?php require_once __DIR__ . '/fim.php'; ?>