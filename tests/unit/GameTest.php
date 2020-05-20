<?php

namespace tests\unit;
use PHPUnit\Framework\TestCase;

require_once '../../app/game.php';

class GameTest extends TestCase
{

    public function testGameWhoAttacks()
    {
        $hero = new \Hero('Orderus', 70, 70, 45, 45 ,20);

        $monster = new \Character('Monster', 60, 60, 40, 40 ,25);

        $game = \Game::Instance();

        $this->assertTrue($game->whoAttacks($hero, $monster));

    }

    public function testGameHandleDamage()
    {
        $hero = new \Hero('Orderus', 70, 70, 45, 45 ,20);

        $game = \Game::Instance();

        $damage = $game->handleDamage(20, $hero->getLuck());

        $this->assertContains($damage, [20, 0]);
    }

    public function testGameAttack()
    {
        $hero = new \Hero('Orderus', 70, 70, 45, 45 ,20);

        $monster = new \Character('Monster', 60, 60, 40, 40 ,25);

        $game = \Game::Instance();

        $this->assertFalse($game->attack($hero, $monster, true));
    }

}
