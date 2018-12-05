<?php
include 'cnx.php';
$sql = $cnx->prepare("select * from film, projeter where numFilm = codeFilm and numCinema ='".$_GET['codeCinema']."'");
$sql->execute();
foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $unFilm)
{
    echo "<div class='divUnFilm' onclick='GetActeurs(".$unFilm['codeFilm'].")'>";
        echo "<img class='imgFilm' value='".$unFilm['codeFilm']."' src='".$unFilm['imageFilm']."'>";
        echo "<h5>".$unFilm['codeFilm']."</h5>";
        echo "<em>".$unFilm['nomFilm']."</em>";
        echo "<br>";
        echo "<div class='etoiles'>";
            echo "<div>";
                echo "<a href='#5' onclick='GetVotes(5,".$unFilm['codeFilm'].")' title='Donner 5 étoiles'>☆</a>";
                echo "<a href='#4' onclick='GetVotes(4,".$unFilm['codeFilm'].")' title='Donner 4 étoiles'>☆</a>";
                echo "<a href='#3' onclick='GetVotes(3,".$unFilm['codeFilm'].")' title='Donner 3 étoiles'>☆</a>";
                echo "<a href='#2' onclick='GetVotes(2,".$unFilm['codeFilm'].")' title='Donner 2 étoiles'>☆</a>";
                echo "<a href='#1' onclick='GetVotes(1,".$unFilm['codeFilm'].")' title='Donner 1 étoile'>☆</a>"; 
            echo "</div>";
            echo "<div id='totaux'>";
                echo "Nb votes : ".$unFilm['nbVotes']."<span>     </span>";
                echo "Total : ".$unFilm['totalVotes']."<span>     </span>";
                if($unFilm['nbVotes'] == 0)
                {
                    echo "Moyenne : 0.0"."<span>     </span>";
                }
                else
                {
                    echo "Moyenne : ". round(($unFilm['nbVotes'] / $unFilm['totalVotes']),2)."<span>     </span>";
                }
                
            echo "</div>";
        echo "</div>";
    echo "</div>";
}
?>