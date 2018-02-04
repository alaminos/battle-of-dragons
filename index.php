<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dragon Battle</title>
</head>
<body>
<header style="font-size:xx-large; color: darkgreen;">Dragon Battle</header>
<h1>The dragons:</h1>
    <?php
        include "dragon.php";

        $dragonList = [ 
            $prout = new Dragon('Prout', 'feu'),
            $morr = new Dragon('Morr', 'vent'),
            $derk = new Dragon('Derk', 'gravité'),
            $gurkep = new Dragon('Gurkep', 'glace'),
            $badalama = new Dragon ('Badalama', 'tonnerre')
        ];

        shuffle($dragonList);

        Dragon::sayHiEverybody($dragonList);

        echo "<h1>Fight!</h1>";
        
        while (count($dragonList) > 1) {
            foreach ($dragonList as $dragon) {
                if ( $dragon->isAlive()) {
                    $target = Dragon::pickEnemy($dragon,$dragonList);
                    $dragon->fight($target);
                }
                $dragonList = array_filter($dragonList, function($e) {
                    return $e->isAlive();
                });
                }
            Dragon::printAllDragonsFeats($dragonList);
            shuffle($dragonList); 
        }

        foreach ($dragonList as $dragon) {
                echo " The battle is finished, the winner is " . $dragon->nom;
            }  
    ?>
</body>
</html>