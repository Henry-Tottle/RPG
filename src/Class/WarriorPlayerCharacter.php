<?php

namespace RPG\Class;

class WarriorPlayerCharacter extends Character
{
    private string $weapon;

    public function __construct(string $name, string $gender, int $age, string $weapon)
    {
        parent::__construct($name, $gender, $age);
        $this->weapon = $weapon;
    }

    public function getWeapon(): string
    {
        return $this->weapon;
    }

    public function attack(Character $opponent, Dice $dice): string
    {
        $result = "$this->name swings at $opponent->name with $this->weapon. ";
        $result .= $opponent->evade($dice, $opponent);
        return $result;
    }
}