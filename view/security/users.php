<?php
    $users = $result["data"]['users']; 
?>

<h1>Liste des utilisateurs</h1>

<?php foreach($users as $user ){ ?>
    <p><a href="index.php?ctrl=profile&action=profile&id=<?= $user->getId() ?>"><?= $user->getUsername() ?></a> <span><?= $user->getRole()?></span></p>
<?php } ?>