<?php

namespace RPG\Class;

class Dice
{
    private int $sides = 6;

    public function getSides(): int
    {
        return $this->sides;
    }



    public function getResult(int $sides): int
    {
        return rand(1, $sides);
    }

    public function roll($sides)
    {

    }
}