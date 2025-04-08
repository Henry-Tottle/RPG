<?php

namespace RPG\Class;

class Mage extends PlayableCharacter
{
    protected string $spell;
    protected string $defensiveMove = "barrier";

    public function __construct(string $name, string $gender, int $age, string $spell, int $health = 8)
    {
        parent::__construct($name, $gender, $age);
        $this->spell = $spell;
        $this->setHealth($health);
    }

    public function setHealth(int $health)
    {
        $this->health = $health;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function takeDamage($hitPoints)
    {
        $this->takeDamage($hitPoints);
    }
    public function defend(): string
    {

        return "$this->name uses $this->defensiveMove";
    }
    public function attack(PlayableCharacter $player)
    {
        $attack = 5;
        $diceRoll = rand(1,6);
        if ($diceRoll <= 3) {
            $player->takeDamage($attack);
            return $this->name . " attacks " . $player->name . " with " .  $this->spell . '. ' . $player->name . "'s health is now " . $player->getHealth();
        }
        else {
            echo $this->name . " attacks " . $player->name . " with " . $this->spell . '. ' . $player->defend();
        }

    }


}