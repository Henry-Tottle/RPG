<?php

namespace RPG\Class;
use RPG\Class\PlayableCharacter;
class Warrior extends PlayableCharacter
{
    protected string $weapon;
    protected string $defensiveMove = 'a shield';

    public function __construct(string $name, string $gender, int $age, string $weapon, int $health = 15)
    {
        parent::__construct($name, $gender, $age);
        $this->weapon = $weapon;
        $this->setHealth($health);
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setHealth(int $health)
    {
        $this->health = $health;
    }

    public function takeDamage(int $hitPoints)
    {
        $this->health -= $hitPoints;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function introduce(): string
    {
        return "$this->name is a warrior. They are $this->age.  The name of their weapon is $this->weapon";
    }
    public function defend(): string
    {
        return "$this->name uses $this->defensiveMove";
    }

    public function attack(PlayableCharacter $player): string
    {
        $damage = 5;
        $player->takeDamage($damage);
        return $this->getName() . " attacked " . $player->getName() . '.  ' . $player->getName() . "'s health is now: " . $player->getHealth();
    }


}