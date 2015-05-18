<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ugani prestolnico</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700,800' rel='stylesheet'
          type='text/css'>
</head>

<body>

    <div class="container">
        <div class="naslov">
            <div class="kviz">
                <p>KVIZ</p>
            </div>
            <div class="podnaslov">
                <p>Ugani glavno mesto države</p>
            </div>
        </div>
        

        <?php

        $drzave = array(
            array(
                "drzava" => "Slovenija",
                "prestolnica" => "Ljubljana",
            ),
            array(
                "drzava" => "Avstrija",
                "prestolnica" => "Dunaj",
            ),
            array(
                "drzava" => "Italija",
                "prestolnica" => "Rim",
            ),
            array(
                "drzava" => "Madžarska",
                "prestolnica" => "Budimpešta",
            ),
        );

        // ob submitu forme
        if (isset($_POST['submit'])):
            // preveri če je polje vpisano
            if ($_POST['prestolnica'] != ''):
                // preveri, če je uganil pravo glavno mesto
                if ((strtolower($_POST['prestolnica']) == strtolower($drzave[$_POST['randomId']]['prestolnica']))):
                    echo "<p class='odg'>Obvladaš, odgovor je pravilen!</p>";
                else:
                    echo "<p class='napacen odg'>Uf, odgovor je napačen!</p>";
                    echo "<p class='namig odg'> Glavno mesto države <strong>" . ($drzave[$_POST['randomId']]['drzava']) . "</strong> je <strong>" . ($drzave[$_POST['randomId']]['prestolnica'])
                        . "</strong>.</p>";
                endif;
            else:
                echo "<p class='error odg'>Brez odgovora, ni rešitve!</p>";
            endif;

            echo "<p class='link odg'><a href='index.php'>Nazaj</a></p>";

        // forma
        else:
            $randomId = rand(0, count($drzave) - 1);     // dobi naključno število med 1 in n
            ?>
            <div class="vsebina">
                <form action="index.php" method="post">
                
                    <label for="mesto" class="vpisi-mesto">Vpiši glavno mesto države <?php echo
                        $drzave[$randomId]['drzava']
                        ?>:</label>
                    <input type="hidden" name="randomId" value="<?php echo $randomId ?>">
                    <input type="text" class="form-control" id="prestolnica" name="prestolnica" placeholder="glavno mesto">
                

                    <button type="submit" name="submit" class="btn btn-default">Oddaj</button>
                </form>
            </div>
        <?php
        endif;
        ?>
    </div>


</body>
</html>