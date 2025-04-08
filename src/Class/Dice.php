<?php

namespace RPG\Class;

class Dice
{
    private int $sides;
    private int $lastRoll;

    public function __construct(int $sides = 6)
    {
        $this->sides = $sides;
    }

    public function getSides(): int
    {
        return $this->sides;
    }



    public function getResult(): int
    {
        $this->lastRoll = rand(0, $this->sides);
        return $this->lastRoll;
    }

    public function getLastRoll(): ?int
    {
        return $this->lastRoll ?? null;
    }


}