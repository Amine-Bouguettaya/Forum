<?php
    $categories = $result["data"]['categories']; 
?>

<h1>Liste des catégories</h1>

<?php
foreach($categories as $category ){ ?>
    <p><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getCategoryName() ?></a></p>
<?php } ?>
<?php if (App\Session::getUser() && App\Session::isAdmin()) { ?>
    <h2>Créer une catégorie</h2>
<form action="index.php?ctrl=forum&action=createCategory" method="post">
    <input type="text" name="categoryName" placeholder="Nom de la catégorie">
    <input type="submit" value="Créer une catégorie">
</form>

<?php } ?>

https://codepen.io/groveet/pen/mpyYga