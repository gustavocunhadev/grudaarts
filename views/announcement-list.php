<?php require_once __DIR__ . '/inicio.php'; 
/** @var \Grudaarts\Mvc\Entity\Announcement[] $announcementList */
?>


<ul class="container">
    <?php foreach ($announcementList as $announcement): ?>
    <li class="announcement">
        <p><?= $announcement->getDescription(); ?></p>
        <p><?= $announcement->getTitle(); ?></p>
        <p><?= $announcement->getProduct()->getName(); ?></p>
    </li>
    <?php endforeach; ?>
</ul>

<?php require_once __DIR__ . '/fim.php'; ?>
