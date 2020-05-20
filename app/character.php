<?php

class Character{

    private $name;
    private $health;
    private $strength;
    private $defence;
    private $speed;
    private $luck;

    public function __construct($name, $health, $strength, $defence, $speed, $luck)
    {
        $this->name = $name;
        $this->health = $health;
        $this->strength = $strength;
        $this->defence = $defence;
        $this->speed = $speed;
        $this->luck = $luck;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setHealth($health)
    {
        if($health < 0){
            $health = 0;
        }
        $this->health = $health;
    }

    public function setStrength($strength)
    {
        $this->strength = $strength;
    }

    public function setDefence($defence)
    {
        $this->defence = $defence;
    }

    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    public function setLuck($luck)
    {
        $this->luck = $luck;
    }

    public function getHealth()
    {
        return $this->health;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStrength()
    {
        return $this->strength;
    }

    public function getDefence()
    {
        return $this->defence;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getLuck()
    {
        return $this->luck;
    }

};
