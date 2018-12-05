<?php
include 'cnx.php';

$sql = $cnx->prepare("select nbVotes, totalVotes from film where codeFilm = ".$_GET['codeFilm']);
$sql->execute();
$resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
echo var_dump($resultat);
$nbVotes = $resultat[0]['nbVotes'] + 1;
$total = $resultat[0]['totalVotes']+$_GET['vote'];
$sql = $cnx->prepare("update film set nbVotes = ".$nbVotes.", totalVotes = ".$total." where codeFilm = ". $_GET['codeFilm']);
$sql->execute();
?>