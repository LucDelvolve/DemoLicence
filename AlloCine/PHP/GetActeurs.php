<?php
include 'cnx.php';
$sql = $cnx->prepare("select * from acteur, jouer where codeActeur = numActeur and numFilm ='".$_GET['codeFilm']."'");
$sql->execute();
foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $unActeur)
{
    echo "<div class='divUnActeur'>";
        echo "<img class='imgActeur' value='".$unActeur['codeActeur']."' src='".$unActeur['nomActeur']."'>";
        echo "<h5>".$unActeur['codeActeur']."</h5>";
        echo "<em>".$unActeur['nomActeur']."</em>";
    echo "</div>";
}

?>