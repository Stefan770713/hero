<?php

class Hero extends Character {

    public function rapidStrike($damage){
        $damage = $damage*2;
        echo "Rapid Strike used. Damage: " . $damage . "<br/>";

        return $damage;
    }

    public function magicShield($damage){
        $damage = $damage/2;
        echo "Magic Shield used. Damage: " . $damage . "<br/>";

        return $damage;
    }

}