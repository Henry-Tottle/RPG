<?php
namespace RPG\Class;

abstract class PlayableCharacter
{
    protected string $name;
    protected string $gender;
    protected int $age;
    protected int $health = 10;

    public function __construct(string $name, string $gender, int $age)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->age = $age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function setHealth(int $health): void
    {
        $this->health = $health;
    }

    public function takeDamage(int $hitPoints): void
    {
        $this->health -= $hitPoints;
    }

    abstract public function attack(PlayableCharacter $player, Dice $dice): string;

    abstract public function defend(Dice $dice, int $damage): string;
}