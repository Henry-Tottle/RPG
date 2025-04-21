<?php

use PHPUnit\Framework\TestCase;
use RPG\Class\NPCCharacterWarrior;

class NPCActionsTest extends TestCase
{
    private NPCCharacterWarrior $npcCharacter;

    public function setUp(): void
    {
        $this->npcCharacter = new NPCCharacterWarrior('Zaphod', 'fluid', 22, 10, 'small sword', 'just some guy you know');
    }

    public function testInitialProperties()
    {
        $this->assertSame('Zaphod', $this->npcCharacter->getName());
        $this->assertSame('fluid', $this->npcCharacter->getGender());
        $this->assertSame(22, $this->npcCharacter->getAge());
        $this->assertSame(10,$this->npcCharacter->getHealth());
        $this->assertSame('small sword', $this->npcCharacter->getWeapon());
        $this->assertSame('just some guy you know', $this->npcCharacter->getDescription());
    }
}