<?php require_once __DIR__ . '/inicio.php'; 
/** @var \Grudaarts\Mvc\Entity\Announcement[] $announcementList */
/** @var \Grudaarts\Mvc\Entity\Product[] $productList */
?>

<div class="container">

<h1>Painel do Vendedor</h1>



<table class="table">
<h2>Tabela de Anúncios</h2>

<a href="/add-announcement-form">Adicionar Anúncio</a>

<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Título</th>
      <th scope="col">Descrição</th>
      <th scope="col">Preço</th>
      <th scope="col">Preço Promocional</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach ($announcementList as $announcement): ?>
    <tr>
      <th scope="row"><?= $announcement->getIdAnuncio() ?></th>
      <td><?= $announcement->getTitle() ?></td>
      <td><?= $announcement->getDescription() ?></td>
      <td><?= $announcement->getProduct()->getPrice() ?></td>
      <td><?= $announcement->getPromocionalPrice() ?></td> 
        <td><div class="acoes_anuncios">
            <a href="/delete-announcement?id=<?= $announcement->getIdAnuncio(); ?>" class="delete_button" >Delete</a>
            <a href="/update-announcement?id=<?= $announcement->getIdAnuncio(); ?>" class="update_button">Atualizar</a>
        </div></td>
    </tr>
    <?php endforeach; ?>
    
  </tbody>
</table>






<table class="table">
<h2>Tabela de Produtos</h2>
<a href="/add-product-form">Adicionar Produto</a>

 <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrição</th>
      <th scope="col">Preço</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach ($productList as $product): ?>
    <tr>
      <th scope="row"><?= $product->getId() ?></th>
      <td><?= $product->getName() ?></td>
      <td><?= $product->getDescription() ?></td>
      <td><?= $product->getPrice() ?></td>
        <td><div class="acoes_anuncios">
            <a href="/delete-announcement?id=<?= $product->getId(); ?>" class="delete_button" >Delete</a>
            <a href="/update-announcement?id=<?= $product->getId(); ?>" class="update_button">Atualizar</a>
        </div></td>
    </tr>
    <?php endforeach; ?>
    
  </tbody>
</table>





</div>
<?php require_once __DIR__ . '/fim.php'; ?>