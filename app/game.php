<?php

final class Game{

    public static function Instance()
    {
        static $inst = null;
        if ($inst === null) {
            $inst = new Game();
        }
        return $inst;
    }
    private function __construct()
    {

    }

    function whoAttacks($orderus, $monster){

        if($orderus->getSpeed() > $monster->getSpeed()){

            echo 'Orderus Speed ' . $orderus->getSpeed() . ' > Monster Speed ' . $monster->getSpeed();
            $isOrderusFirst = true;

        }else if($orderus->getSpeed() == $monster->getSpeed()){
            echo 'Orderus Speed ' . $orderus->getSpeed() . ' = Monster Speed ' . $monster->getSpeed() . '<br/>';
            if($orderus->getLuck() > $monster->getLuck()){
                echo 'Orderus Luck ' . $orderus->getLuck() . ' > Monster Luck ' . $monster->getLuck();
                $isOrderusFirst = true;
            }else{
                echo 'Monster Luck ' . $monster->getLuck() . ' > Monster Luck ' . $orderus->getLuck();
                $isOrderusFirst = false;
            }
        }else{

            echo 'Monster Speed ' . $monster->getSpeed() . ' > Orderus Speed ' . $orderus->getSpeed();
            $isOrderusFirst = false;
        }

        return $isOrderusFirst;
    }

    function handleDamage($damage, $characterLuck){
        $luck = rand(0,99);
        if ($luck < $characterLuck){
            echo 'Lucky <br/>';
            $damage = 0;
        }

        echo 'Damage: ' . $damage . '<br/>';

        return $damage;
    }

    function handleHealth($defender, $damage){

        $healthMonster = $defender->getHealth() - $damage;

        echo $defender->getName() . ' health: ' . $defender->getHealth() . '<br/>';

        $defender->setHealth($healthMonster);

        echo $defender->getName() .' health remaining: ' .  $defender->getHealth() . '<br/>';
    }

    function attack($orderus, $monster, $isOrderusAttacking){

        $percent = rand(0,99);

        if($isOrderusAttacking){
            echo '<br/>' . $orderus->getName() . ' attacks <br/>';

            $damage = $orderus->getStrength() - $monster->getDefence();

            //check rapidStrike
            if ($percent < 10){
                echo 'Initial damage: ' . $damage . '<br/>';
                $damage = $orderus->rapidStrike($damage);
            }

            //check getLuck
            $damage = $this->handleDamage($damage, $monster->getLuck());

            $this->handleHealth($monster, $damage);

            return false;

        }else{

            echo '<br/>' . $monster->getName() . ' attacks <br/>';

            $damage = $monster->getStrength() - $orderus->getDefence();

            //check magicShield
            if ($percent < 20){
                echo 'Initial damage: ' . $damage . '<br/>';
                $damage = $orderus->magicShield($damage);
            }

            //check getLuck
            $damage = $this->handleDamage($damage, $orderus->getLuck());

            $this->handleHealth($orderus, $damage);

            return true;
        }

    }

}