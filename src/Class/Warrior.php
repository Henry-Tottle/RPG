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

    public function getWeapon(): string
    {
        return $this->weapon;
    }

    public function introduce(): string
    {
        return "$this->name is a warrior. They are $this->age.  The name of their weapon is $this->weapon";
    }

    public function defenceCheck(Dice $roll): bool
    {
        $result = $roll->getResult($roll->getSides());
        return $result > 4;
    }


    public function attack(PlayableCharacter $player, Dice $dice): string
    {
        $damage = 5;
        echo "$this->name attacks " . $player->getName() . ' using ' . $this->weapon . '.' . PHP_EOL;
        return $player->defend($dice, $damage);
    }

    public function defend(Dice $dice, int $damage): string
    {
        if ($this->defenceCheck($dice))
        {
            return "$this->name uses $this->defensiveMove";
        }
        else
        {
            $this->takeDamage($damage);
            return "$this->name was hit. $this->name has $this->health remaining.";
        }
    }

}