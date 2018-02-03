<?php
    
    class Dragon
    {
        private $pouvoir;

        public $nom;

        public $vie = 5;

        public function sayHi()
        {
            echo "Coucou je m'apelle " . $this->nom . "<br>";
        }

        public function fight($enemy) 
        {
            $puissance = rand(1,12);
            echo "<br> " . $this->nom . " : <br>Je fais une attaque de " . $this->pouvoir . " de puissance " . $puissance . " contre " . $enemy->nom . ". <br>";
            $enemy->recevoirDegats($puissance);
        }

        public function recevoirDegats($degats)
        {
            $this->vie -= $degats;
            if ($this->isAlive()) {
                echo "<br>Life energy left in " . $this->nom . " : " . $this->vie ;
            } else {
                echo "<br>Dead dragon! Dead dragon! RIP: " . $this->nom . "<br><br>";
            }
        }

        public function printFeatures()
        {
            echo "<br>Name: " . $this->nom;
            echo "<br>Power: " . $this->pouvoir;
            echo "<br>Energy: " . $this->vie;
        }

        public function isAlive()
        {
            return $this->vie > 0;
        }

        public function __construct($nom, $pouvoir)
        {
            $this->nom = $nom;
            $this->pouvoir = $pouvoir;
        }


    }
?>