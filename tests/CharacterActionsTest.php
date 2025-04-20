<?php

use PHPUnit\Framework\TestCase;
use RPG\Class\Dice;
use RPG\Class\WarriorPlayerCharacter;

class CharacterActionsTest extends TestCase
{
    private WarriorPlayerCharacter $WarriorCharacter;

    public function setUp(): void
    {
        $this->WarriorCharacter = new WarriorPlayerCharacter('Arthas', 'Male', 22, 'short sword');
    }

    public function testInitialProperties()
    {
        $this->assertSame('Arthas', $this->WarriorCharacter->getName());
        $this->assertSame('Male', $this->WarriorCharacter->getGender());
        $this->assertSame(22, $this->WarriorCharacter->getAge());
        $this->assertSame('short sword', $this->WarriorCharacter->getWeapon());
        $this->assertSame(['Health Potion'=>2], $this->WarriorCharacter->getItems());
    }

    public function testDefendBlocksAttack()
    {
        $dice = $this->createMock(Dice::class);
        $dice->method('getResult')->willReturn(6);
        $result = $this->WarriorCharacter->defend($dice);
        $this->assertSame("Arthas blocked the attack and took no damage.", $result);
    }

    public function testDefendFails()
    {
        $dice = $this->createMock(Dice::class);
        $dice->method('getResult')->willReturn(1);
        $result = $this->WarriorCharacter->defend($dice);
        $this->assertSame("Arthas took damage.  They have 9 remaining.", $result);
    }

    public function testTakeDamage()
    {
        $this->WarriorCharacter->setHealth(10);
        $this->WarriorCharacter->takeDamage(6);
        $this->assertSame(4, $this->WarriorCharacter->getHealth());
    }
    public function testEvadeSuccessful()
    {
        $dice = $this->createMock(Dice::class);
        $dice->method('getResult')->willReturn(5); // > 4 means evade succeeds

        $opponent = $this->createMock(WarriorPlayerCharacter::class);
        $opponent->method('getName')->willReturn('Goblin');

        $result = $this->WarriorCharacter->evade($dice, $opponent);

        $this->assertEquals("Goblin evaded the attack. \n", $result);
    }

    public function testEvadeFailsAndDefendIsCalled()
    {
        $dice = $this->createMock(Dice::class);
        $dice->method('getResult')->willReturn(3); // <= 4 means evade fails, fallback to defend

        // You could spy on defend by creating a partial mock
        $characterMock = $this->getMockBuilder(WarriorPlayerCharacter::class)
            ->setConstructorArgs(['Arthas', 'Male', 22, 'short sword'])
            ->onlyMethods(['defend'])
            ->getMock();

        $characterMock->expects($this->once())
            ->method('defend')
            ->with($dice)
            ->willReturn('defended!');

        $opponent = $this->createMock(WarriorPlayerCharacter::class);
        $opponent->method('getName')->willReturn('Goblin');

        $result = $characterMock->evade($dice, $opponent);

        $this->assertEquals('defended!', $result);
    }

    public function testHealIncreasesHealthAndReducesPotionCount()
    {
        $this->WarriorCharacter->setHealth(5);
        $this->WarriorCharacter->setItems(['Health Potion' => 2]);

        $result = $this->WarriorCharacter->heal();

        $this->assertEquals(10, $this->WarriorCharacter->getHealth());
        $this->assertEquals(['Health Potion' => 1], $this->WarriorCharacter->getItems());
        $this->assertEquals("Arthas drank a health potion and now has 10 HP.  They have 1 potions left.\n", $result);
    }



}