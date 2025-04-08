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
}