<?php
require('vendor/autoload.php');

use RPG\Class\Dice;
use RPG\Class\WarriorPlayerCharacter;
use RPG\Class\NPCCharacterWarrior;

$dice = new Dice();

$name = readline('Name:');
$age = readline('Age:');
$gender = readline('Gender:');
$weapon = 'an old sword';

$player = new WarriorPlayerCharacter($name, $gender, $age, $weapon);
$npcOpponent = new NPCCharacterWarrior('Ser Clethas', 'unknown', 200, 7, 'rusty sword',
    'an undead knight who has been rotting in this cave for decades.  
    His armor is coated in grime and rust, however the spark in his one remaining eye belies a speed not to be underestimated...'.PHP_EOL);

echo 'You, ' . $player->getName() . ', have awoken in a damp and dark cave.  Water droplets reverberate around you.  Limited light
filters through few cracks in the ceiling, providing enough light to see your immediate surroundings.  Further into the gloom
a scraping sound can be heard.  Leaning against a rock beside you is ' . $weapon . '.  It will do for now.  Armed, you investigate
the sound.' . PHP_EOL;

function endgame($player)
{
    if ($player->getHealth() < 1)
    {
        return $player->getName() . ' is mortally wounded and falls to the ground.';
    }
}

function combat($player, $npcOpponent, $dice)
{
    echo $npcOpponent->introduce();
    while ($player->getHealth() > 0 && $npcOpponent->getHealth() > 0) {
        echo PHP_EOL;
        $input = readline('You can attack or heal, what do you do: ');
        if ($input === 'heal') {
            $items = $player->getItems();
            if ($items['Health Potion'] > 0) {
                echo $player->heal();
            } else {
                echo "You don't have enough potions to heal, the only thing left is to attack.";
                echo $player->attack($npcOpponent, $dice);
            }
        }
        elseif ($input === 'attack')
        {
            echo $player->attack($npcOpponent, $dice);
        }
        else
        {
            readline("You must choose attack or heal: ");
        }
        if (endgame($npcOpponent))
        {
             break;
        }

         echo $npcOpponent->npcTurn($dice, $player);
        if (endgame($player))
        {
            break;
        }
    }
}

echo combat($player, $npcOpponent, $dice);