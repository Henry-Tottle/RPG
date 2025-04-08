<?php

use PHPUnit\Framework\TestCase;
use RPG\Class\Warrior;

class WarriorTest extends TestCase
{
    public function testWarriorAttackSuccess()
    {
        $warrior = new Warrior('Steve', 'Male', 21, 'Sword');
        $warrior2 = new Warrior('James', 'Male', 21, 'Sword');
        $result = $warrior->attack($warrior2);

        $expected = "Steve attacked James.  James's health is now: 10";

        $this->assertEquals($expected, $result);
    }

    public function testWarriorAttackMalformed()
    {
        $warrior = new Warrior('Steve', 'Male', 21, 'Sword');
        $this->expectException(TypeError::class);
        $warrior->attack("Stephen");
    }
}