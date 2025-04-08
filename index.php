<?php
require('vendor/autoload.php');

use RPG\Class\Dice;
use RPG\Class\Warrior;
use RPG\Class\Mage;
//$playerOne = new Warrior('Gawain', 'Male', 31, 'Exodus');
//$playerTwo = new Warrior('George', 'Male', 27, 'SandwichCutter');
//$playerThree = new Mage('Cecil', 'Male', 101, 'immolate');
//echo $playerOne->introduce();
//echo PHP_EOL;
//echo $playerOne->attack($playerTwo);
//echo PHP_EOL;
//echo $playerThree->attack($playerOne);

$dice = new Dice();
echo $dice->getResult($dice->getSides());
