<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
?>

<h1>Liste des topics de la categorie: <?=$category?></h1>

<?php
if($topics == null){
    echo "<p>Il n'y a pas de topics dans cette catégorie</p>";
} else {
foreach($topics as $topic ){ ?>
    <p><a href="index.php?ctrl=forum&action=findPostsByTopic&id=<?= $topic->getId() ?>"><?= $topic ?></a> par <?= $topic->getUser() ?></p>
<?php }
} ?>

<?php if (App\Session::getUser()) { ?>
    <h2>Créer un topic</h2>
<form action="index.php?ctrl=forum&action=createTopic&id=<?=$category->getId()?>" method="post">
    <input type="text" name="title" placeholder="Nom du Topic">
    <input type="text" name="text" placeholder="Premier post du topic">
    <input type="submit" value="Créer un topic">
</form>

<?php } ?>