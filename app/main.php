<?php

spl_autoload_register();

$monster = new Character('Monster', $health = rand(60, 90), $strength = rand(60, 90), $defence = rand(40, 60), $speed = rand(40, 60), $luck = rand(25, 40));

$orderus = new Hero('Orderus', $health = rand(70, 100), $strength = rand(70, 80), $defence = rand(45, 55), $speed = rand(40, 50), $luck = rand(10, 30));


$i = 0;
$game = Game::Instance();

while ($i < 20 && $orderus->getHealth() > 0 && $monster->getHealth() > 0){
    echo 'Round: ' . ($i + 1) .'<br/>';
    //first attack
    if($i == 0){
        //check who attacks
        $isOrderusAttacking = $game->whoAttacks($orderus, $monster);
        $next = $game->attack($orderus, $monster, $isOrderusAttacking);
    }else{
        $next = $game->attack($orderus, $monster, $next);
    }

    echo '<br/>';

    if($i == 19){
        if($orderus->getHealth() < $monster->getHealth()){
            echo 'Monster won!';
        }else{
            echo 'Orderus won!';
        }
    }
    $i++;
}

if($orderus->getHealth() == 0){
    echo 'Monster won!';
} else if($monster->getHealth() == 0){
    echo 'Orderus won!';
}