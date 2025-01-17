<?php
    $users = $result["data"]['users'];
    $topics = $result["data"]['topics'];
?>

<h1>Liste des utilisateurs</h1>

<?php
    if ($users) {
        foreach($users as $user){ ?>
            <p><a href="index.php?ctrl=profile&action=profile&id=<?= $user->getId() ?>"><?= $user->getUsername() ?></a> <span><?= $user->getRole()?></span></p>
            <br>
<?php } 
} else { ?>
<span>Aucun utilisateur trouvé</span>
    <?php
}
?>
<h1>Liste des Topics</h1>

<?php if ($topics) {
    foreach ($topics as $topic) { ?>
        <p><a href="index.php?ctrl=forum&action=findPostsByTopic&id=<?= $topic->getId() ?>"><?= $topic ?></a> par <a href="index.php?ctrl=profile&action=profile&id=<?= $topic->getUser()->getId() ?>"><?= $topic->getUser()->getUsername()?></a></p>
<?php }
} else { ?>
 <span>Aucun topic trouvé</span>
<?php } ?>