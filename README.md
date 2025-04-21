# 🛡️ Warrior Mage Rogue Game

A small-scale turn-based RPG project, written in PHP, that started as a refresher in object-oriented programming and is growing into something bigger! This game currently features a `Warrior` class, dice-based combat mechanics, and abstract character logic ready to scale into a more complex system.

---

## 🚧 Build Steps (So Far)

- ✅ Create `Character` abstract class
- ✅ Create `WarriorPlayerCharacter` class that extends `Character`

[//]: # (- ✅ Write PHPUnit tests for `Warrior` methods)
- ✅ Add core `Warrior` methods:
    - `attack()`
    - `defend()`
    - `heal()` 
- ✅ Create `Dice` roll mechanic
- 🚧 Create additional player classes (`Mage`, `Rogue`, etc.)
- 🚧 Create Game class
- 🚧 Create tests for defend, heal, attack, getResult

---

## 🧱 Class Overview

### `Character` (abstract)

> *(Might be renamed to `Character` if NPCs also extend it)*

- `getName(): string`
- `getGender(): string`
- `getAge(): int`
- `getHealth(): int`
- `setHealth(int $health): void`
- `getItems(): array`
- `setItems(array $items): void`
- `takeDamage(int $hitPoints): void`
- `attack(PlayableCharacter $player, Dice $dice): string` *(abstract)*
- `defend(Dice $dice): string` 
- `heal(): string`

---

### `Dice`

- `getSides(): int` — returns the number of sides
- `getResult(): int` — rolls and returns a random result
- `getLastRoll(): int` — *(not currently used)*

---

### `WarriorPlayerCharacter` (extends `Character`)

- `introduce(): string`
- `attack(Character $opponent, Dice $dice): string`
--- `returns a two part string, the first part with the attack action, the second is the result of opponent->defend()`
--- `this is where I want evade hit/miss to be injected`

## 🕹️ How to Run

1. Clone the repo
2. Install dependencies with Composer
   ```bash
   composer install
    php index.php