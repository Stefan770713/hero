<?php

namespace tests\unit;
use PHPUnit\Framework\TestCase;


class HeroTest extends TestCase
{

    public function testHeroName()
    {
        $hero = new \Hero('Orderus', 70, 70, 45, 45 ,20);

        $hero->setName('Orderus2');

        $this->assertEquals($hero->getName(), 'Orderus2');
    }

    public function testHeroRapidStrike()
    {
        $hero = new \Hero('Orderus', 70, 70, 45, 45 ,20);

        $damage = $hero->rapidStrike(20);

        $this->assertEquals($damage, 40);
    }

    public function testHeroMagicShield()
    {
        $hero = new \Hero('Orderus', 70, 70, 45, 45 ,20);

        $damage = $hero->magicShield(20);

        $this->assertEquals($damage, 10);
    }
    public function testHeroHealth()
    {
        $hero = new \Hero('Orderus', 70, 70, 45, 45 ,20);

        $hero->setHealth(-20);

        $this->assertEquals($hero->getHealth(), 0);
    }

}
