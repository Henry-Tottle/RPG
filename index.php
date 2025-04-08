<?php
require('vendor/autoload.php');

use RPG\Class\Dice;
use RPG\Class\Warrior;
use RPG\Class\Mage;

$name = readline("Name: ");
$gender = readline("Gender: ");
$age = readline("Age: ");
$weapon = readline('Weapon: ');

$playerOne = new Warrior($name, $gender, intval($age), $weapon);
echo $playerOne->introduce();
echo PHP_EOL;
$playerTwo = new Warrior('George', 'Male', 27, 'SandwichCutter');
$dice = new Dice();
while ($playerOne->getHealth() > 0 && $playerTwo->getHealth() > 0) {
    echo $playerOne->attack($playerTwo, $dice);
    echo PHP_EOL;
    echo $playerTwo->attack($playerOne, $dice);
    echo PHP_EOL;
    if ($playerOne->getHealth() <= 0)
    {
        echo $playerTwo->getName() . " wins!" . PHP_EOL;
    }
    else if ($playerTwo->getHealth() <= 0){
        echo $playerOne->getName() . " wins!" .PHP_EOL;
    }
}
