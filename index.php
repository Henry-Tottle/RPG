<?php
require('vendor/autoload.php');

use RPG\Class\Dice;
use RPG\Class\WarriorPlayerCharacter;

$dice = new Dice();
$playerOne = new WarriorPlayerCharacter('Arthas', 'Male', 31, 'Big Sword');
$playerTwo = new WarriorPlayerCharacter('Steven', 'Male', 31, 'Medium Sword');

echo $playerOne->attack($playerTwo, $dice);
echo $playerTwo->heal();