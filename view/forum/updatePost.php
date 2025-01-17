<?php 
$post = $result["data"]['post'];
?>


<a href="index.php?ctrl=forum&action=findPostsByTopic&id=<?= $post->getTopic()->getId() ?>">Retour</a>

<form action="index.php?ctrl=forum&action=updatePost&id=<?= $post->getId() ?>" method="POST">
    <label for="text">Modifer votre post</label>
    <input type="text" name="text" value="<?=$post->getText()?>">
    <input type="submit" name="submit" value="Modifier">
</form>