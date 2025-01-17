<?php
    $topic = $result["data"]['topic'] ;
    $posts = $result["data"]['posts']; 

    if (($topic->getClosed() == "OPEN" && App\Session::getUser() && App\Session::getUser()->getId() == $topic->getUser()->getId()) || App\Session::isAdmin()) {
        ?>

<form action="index.php?ctrl=forum&action=editTopic&id=<?=$topic->getId()?>" method="post">
    <input type="text" name="text" placeholder="Nouveau nom">
    <input type="submit" value="Modifier topic Nom">
</form>
<?php  }

?>
<h1>Liste des posts du topic: <?=$topic?></h1>

<?php
if($posts == null){
    echo "<p>Il n'y a pas de post dans ce topic</p>";
} else {
foreach($posts as $post ){ ?>
<p><?= $post ?></p>
<?php if ($post->getUser() && $post->getUser()->getId() == App\Session::getUser()->getId()) { ?>
<a href="index.php?ctrl=forum&action=updatePost&id=<?= $post->getId()?>">Modifier</a>
<?php } ?>
<?php if (($post->getUser() && $post->getUser()->getId() == App\Session::getUser()->getId()) || App\Session::isAdmin()) { ?>
<a href="index.php?ctrl=forum&action=deletePost&id=<?= $post->getId()?>">Supprimer</a>
<?php } ?>
<span>par</span>
    <?php if ($post->getUser()) { ?>
    <a href="index.php?ctrl=profile&action=index&id=<?=$topic->getUser()->getId()?>"><?= $post->getUser()->getUsername() ?></a>
    <?php } else { ?>
        <span>Utilisateur Supprimé</span>
    <?php } ?>
    <br>
    <br>
<?php }
} ?>

<?php 
    if ($topic->getClosed() == "OPEN" && App\Session::getUser()) {
        ?>
        <form action="index.php?ctrl=forum&action=createPost&id=<?=$topic->getId()?>" method="post">
            <input type="text" name="text" placeholder="votre post">
            <input type="submit" value="Créer un post">
        </form>
  <?php  }

?>
<br>
<?php 
    if ((App\Session::getUser() && App\Session::getUser()->getId() == $topic->getUser()->getId()) || App\Session::isAdmin()) {
        ?>
<a href="index.php?ctrl=forum&action=deleteTopic&id=<?=$topic->getId()?>">delete Topic</a>

<?php 
    }
    if ($topic->getClosed() == "OPEN" && (App\Session::getUser() && App\Session::getUser()->getId() == $topic->getUser()->getId() || App\Session::isAdmin())) {
        ?>
<a href="index.php?ctrl=forum&action=manageTopic&id=<?=$topic->getId()?>">Close Topic</a>
<?php  }
    if (($topic->getClosed() == "CLOSED" && (App\Session::getUser() && App\Session::getUser()->getId() == $topic->getUser()->getId() || App\Session::isAdmin())) || ($topic->getClosed() == "CLOSED_ADMIN" && App\Session::isAdmin())) { ?>
        <a href="index.php?ctrl=forum&action=manageTopic&id=<?=$topic->getId()?>">open Topic</a> <?php
    }

?>

