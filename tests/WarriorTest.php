<?php

use PHPUnit\Framework\TestCase;
use RPG\Class\Dice;
use RPG\Class\Warrior;

class WarriorTest extends TestCase
{
    private Warrior $warrior;

    protected function setUp(): void
    {
        $this->warrior = new Warrior('Arthas', 'Male', 17, 'Big Knife');
    }

    public function testWarriorInitialProperties()
    {
        $this->assertEquals('Arthas', $this->warrior->getName());
        $this->assertEquals('Male', $this->warrior->getGender());
        $this->assertEquals(17, $this->warrior->getAge());
        $this->assertEquals('Big Knife', $this->warrior->getWeapon());
        $this->assertEquals(15, $this->warrior->getHealth());
    }

    public function testDefendBlocksAttack()
    {
        $dice = $this->createMock(Dice::class);
        $dice->method('getSides')->willReturn(6);
        $dice->method('getResult')->willReturn(6);

        $result = $this->warrior->defend($dice, 5);

        $this->assertStringContainsString('uses a shield', $result);
        $this->assertEquals(15, $this->warrior->getHealth());
    }

    public function testFailedDefend()
    {
        $dice = $this->createMock(Dice::class);
        $dice->method('getSides')->willReturn(6);
        $dice->method('getResult')->willReturn(3);

        $result = $this->warrior->defend($dice, 5);

        $this->assertStringContainsString('was hit', $result);
        $this->assertEquals(10, $this->warrior->getHealth());
    }

    public function testAttackCallsDefendOnOpponent()
    {
        $opponent = $this->createMock(\RPG\Class\PlayableCharacter::class);
        $dice = $this->createMock(Dice::class);

        $opponent->expects($this->once())
            ->method('defend')
            ->with($dice, 5)
            ->willReturn('mocked defense');

        $result = $this->warrior->attack($opponent, $dice);

        $this->assertEquals('mocked defense', $result);
    }






}