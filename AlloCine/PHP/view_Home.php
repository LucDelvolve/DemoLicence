<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../JQuery/jquery-3.1.1.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="../CSS/styles.css"/>
    <script src="../JS/Fonctions.js"></script>
    <script type="text/javascript">
        $
        (
            function()
            {
                $('.divCine').click
                (
                    function()
                    {
                        GetFilms(($(this).children('img').attr('value')));
                    }
                );
            }
        );
        
        </script>
</head>
<body>
    <?php
        include 'cnx.php';
        $sql = $cnx->prepare("select codeCine,nomCine,imageCine from cinema");
        $sql->execute();
        foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $unCine)
        {
            echo "<div class='divCine'>";
                    echo "<img class='imgCine' value='".$unCine['codeCine']."' src='".$unCine['imageCine']."'>";
                    echo "<h5>".$unCine['codeCine']."</h5>";
                    echo "<em>".$unCine['nomCine']."</em>";
                echo "</div>";
        }
    ?>
    <div id="divFilms"></div>
    <div id="divActeurs"></div>
</body>
</html>