<?php
namespace RPG\Class;


abstract class Character
{
    protected string $name;
    protected string $gender;
    protected int $age;
    protected int $health = 10;
    protected array $items = ['Health Potion'=>2];

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

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items)
    {
        $this->items = $items;
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

    public function defend(Dice $dice): string
    {
        if ($dice->getResult() >= 4)
        {
            return "$this->name blocked the attack and took no damage.";
        }
        else
        {
            $this->takeDamage($dice->getResult());
            return "$this->name took damage.  They have $this->health remaining.";
        }
    }

    public function heal(): string
    {
        $items = $this->getItems();
        $this->setHealth($this->health += 5);
        $items['Health Potion']--;
        $this->setItems($items);
        $itemQuantity = $this->items['Health Potion'];

        return "$this->name drank a health potion and now has $this->health HP.  They have $itemQuantity potions left.";
    }



}