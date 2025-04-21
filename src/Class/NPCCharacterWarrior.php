<?php

namespace RPG\Class;

class NPCCharacterWarrior extends Character
{
    private string $weapon;
    private string $description;
    public function __construct(string $name, string $gender, int $age, int $health, string $weapon, string $description)
    {
        parent::__construct($name, $gender, $age);

        $this->setHealth($health);
        $this->weapon = $weapon;
        $this->description = $description;
        $this->items['Health Potion'] = rand(0,1);
    }

    public function introduce(): string
    {
        return $this->getName() . " is $this->description.  It is wielding a $this->weapon.";
    }

    public function attack(Dice $dice, Character $opponent): string
    {
        $result = "$this->name swings at $opponent->name with $this->weapon. ";
        $result .= $opponent->defend($dice);
        return $result;
    }

    public function npcTurn(Dice $dice, Character $opponent): string
    {
        if ($this->health < 4 && $this->items['Health Potion'] > 0)
        {
            return $this->heal();
        }
        else
        {
            return $this->attack($dice, $opponent);
        }
    }
}