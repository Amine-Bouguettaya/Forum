<?php
    $users = $result["data"]['users']; 
?>

<h1>Liste des utilisateurs</h1>

<?php foreach($users as $user ){ ?>
    <p><a href="index.php?ctrl=profile&action=profile&id=<?= $user->getId() ?>"><?= $user->getUsername() ?></a> <span><?= $user->getRole()?></span></p>
    <form action="index.php?ctrl=profile&action=modifyRole&id=<?= $user->getId() ?>" method="post">
        <select name="role" id="role">
            <option value="ROLE_USER">Utilisateur</option>
            <option value="ROLE_MOD">Modérateur</option>
            <option value="ROLE_ADMIN">Administrateur</option>
        </select>
        <input type="submit" value="Modifier le role">
    </form>
    <br>
    <br>

<?php } ?>