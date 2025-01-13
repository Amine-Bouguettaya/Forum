<?php
    $topic = $result["data"]['topic'] ;
    $posts = $result["data"]['posts']; 
?>

<h1>Liste des posts</h1>

<?php
foreach($posts as $post ){ ?>
<a href="index.php?ctrl=forum&action="><?= $post ?></a>
    <a href="index.php?ctrl=forum&action=getPostByUserId"> par <?= $post->getUser() ?></p>
<?php }