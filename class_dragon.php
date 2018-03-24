<?php
    
    class Dragon
    {
        public function __construct($nom, $pouvoir, $couleur)
        {
            $this->nom = $nom;
            $this->pouvoir = $pouvoir;
            $this->couleur = $couleur;
        }
        
        public $nom;    
        
        public $pouvoir;

        public $couleur;

        public $vie = 5;

        public function sayHi()
        {
            echo "Coucou je m'apelle " . $this->nom . "<br>";
        }

        public static function sayHiEverybody($arr)
        {
            foreach ($arr as $e) {
                $e->sayHi();
            }
        }

        public function fight($enemy) 
        {
            $puissance = rand(1,12);
            echo $this->nom . " : <br>Je fais une attaque de " . $this->pouvoir . " de puissance " . $puissance . " contre " . $enemy->nom . ". <br>";
            echo "ZZZZHHHHHRRRGGGHHHH!!!<br>";
            $enemy->recevoirDegats($puissance);
        }

        public function recevoirDegats($degats)
        {
            $this->vie -= $degats;
            if ($this->isAlive()) {
                echo "Points de vie de " . $this->nom . " : " . $this->vie . "<br><br>";
            } else {
                echo "Dead dragon! Dead dragon! RIP: " . $this->nom . "<br><br>";
            }
        }

        public function printFeatures()
        {
            echo "Name: " . $this->nom . "<br>";
            echo "Power: " . $this->pouvoir . "<br>";
            echo "Life: " . $this->vie . "<br><br>";
        }

        public function isAlive()
        {
            return $this->vie > 0;
        }

        

        public static function pickEnemy($attacker,$possibleTargets)
        { //chooses enemy from an array of possible targets
            $target = $possibleTargets[array_rand($possibleTargets)]; //random pick from array
            if ($target == $attacker) { //if invalid target, repeat
                $target = Dragon::pickEnemy($attacker,$possibleTargets); 
            }
            return $target;
        }

        public static function printAllDragonsFeats($arr)
        {
            echo "<h3>These are the dragons left alive now: </h3><br>";
            foreach ($arr as $e) {
                $e->printFeatures();
            }
        }

    }
?>