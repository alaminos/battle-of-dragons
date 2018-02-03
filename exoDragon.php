<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dragon Battle</title>
</head>
<body>
<h1 style="font-size:40px; color: darkgreen;">Dragon Battle</h1>
    <?php
        include "dragon.php";

        $dragonList = [
            $prout = new Dragon('Prout', 'feu'),
            $morr = new Dragon('Morr', 'vent'),
            $derk = new Dragon('Derk', 'gravité'),
            $gurkep = new Dragon('Gurkep', 'glace'),
            $badalama = new Dragon ('Badalama', 'tonnerre')
        ];

        
       function howManyAlive($arr) {  //returns total number of living dragons
           $totalNumber = 0;
           foreach ($arr as $dragon) {
               if ( $dragon->isAlive() ) {
                    $totalNumber ++;
               }
           }
           return $totalNumber;  
       }

        
        function pickEnemy($attacker,$possibleTargets) { //chooses enemy from possible targets
            $target = $possibleTargets[array_rand($possibleTargets)]; //random pick from array
            if ($target == $attacker) {
                $target = pickEnemy($attacker,$possibleTargets); //if invalid target, repeat
            }
            return $target;
        }

    
        foreach ($dragonList as $dragon) {
            $dragon->sayHi();
        }
    
        while (count($dragonList) > 1) {
            foreach ($dragonList as $dragon) {
                if ( $dragon->isAlive()) {
                    $target = pickEnemy($dragon,$dragonList);
                    $dragon->fight($target);
                }
                $dragonList = array_filter($dragonList, function($e) {
                    return $e->isAlive();
                });
                }
            echo "These are the dragons left alive : <pre>";
            echo print_r($dragonList);
            echo "</pre>";
            
        }

       
        foreach ($dragonList as $dragon) {
                echo " The battle is finished, the winner is " . $dragon->nom;
            }
           
            
  
    ?>
</body>
</html>