<?php
require('vendor/autoload.php');

use RPG\Class\Dice;
use RPG\Class\Warrior;
use RPG\Class\Mage;

function endGame($playerOne, $playerTwo)
{
    if ($playerOne->getHealth() <= 0)
    {
        return $playerTwo->getName() . " wins!" . PHP_EOL;
    }
    else if ($playerTwo->getHealth() <= 0){
        return $playerOne->getName() . " wins!" .PHP_EOL;
    }
}

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
    echo endGame($playerOne, $playerTwo);
    echo PHP_EOL;
    echo $playerTwo->attack($playerOne, $dice);
    echo endGame($playerOne, $playerTwo);
    echo PHP_EOL;

}
