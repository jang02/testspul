<?php


class Pokemon
{

    public $pokemon;
    public $alive;
    public $url;
    public $level;
    public $name;
    public $health;
    public $attack;
    public $defence;
    public $moves = [];
    public $types = [];


    public function __construct($pokemon, $name, $level, $max_health, $attack, $defence, $moves, $test)
    {
        $this->pokemon = $pokemon;
        $this->name = $name;
        $this->level = $level;
        $this->health = $this->statFormula($max_health, true);
        $this->attack = $this->statFormula($attack);
        $this->defence = $this->statFormula($defence);
        $this->moves = $moves;
        $this->alive = true;
        $this->url = 'https://img.pokemondb.net/artwork/' . strtolower($pokemon) . '.jpg';

        foreach ($test as $type) {
            $this->types[] = Types::getTypeFromName($type);
        }

    }

    public function __toString()
    {
        return json_encode($this);
    }

    public function status()
    {
        echo $this->alive;
        echo $this->health;
    }

    public function setHealth($hp)
    {
        $this->health = $hp;
    }

    public function getHealth()
    {
        return $this->health;
    }


    public function attack($move, $enemy)
    {
        $movetype = $move->type;
        var_dump($movetype);
        $damage = (($this->level / 5 + 2) * $move->power * $this->attack / $enemy->defence) / 50 + 2;
        for ($i = 0; $i < sizeof($enemy->types); $i++) {
            if (in_array($enemy->types[$i], $movetype[1])) {
                $damage *= 2;
            } else if (in_array($enemy->types[$i], $movetype[2])) {
                $damage *= 0.5;
            } else if (in_array($enemy->types[$i], $movetype[3])) {
                $damage *= 0;
            }
        }

        $damage = round($damage, 0);

        if ($enemy->alive && $this->alive) {
            if ($damage > 10000) {
                echo "Cheating damage stat found!";
            } else {
                echo '<br><span style="color: #00bf00">' . $this->name . ' (' . $this->pokemon . ')</span> attacked <span style="color: red">' . $enemy->name .
                    ' (' . $enemy->pokemon . ')</span> using ' . $move->name . ' and did <span style="color: #00bfbf;">' . $damage . '</span> damage!';
                $enemy->setHealth($enemy->health -= $damage);
                if ($enemy->getHealth() <= 0) {
                    echo '<br><span style="color: red">' . $enemy->name . ' (' . $enemy->pokemon . ')</span> fainted! <span style="color: #00bf00">' . $this->name . ' (' . $this->pokemon . ')</span> has won the battle!';
                    $enemy->setHealth(0);
                    $enemy->alive = false;
                } else {
                    echo '<br><span style="color: red">' . $enemy->name . ' (' . $enemy->pokemon . ')</span> has ' . $enemy->health . 'HP left!';
                }
            }
            echo "<br>";
        }
    }

    private function statFormula($basestat, bool $health = false): int
    {
        $stat = $basestat;
        $iv = rand(0, 32);
        $ev = 0;
        if ($health) {
            return floor(
                    (2 * $stat + $iv + floor(sqrt($ev) / 4)) * $this->level / 100
                ) + $this->level + 10;
        }
        return floor(
            (
                floor((2 * $stat + $iv + floor(sqrt($ev) / 4)) * $this->level / 100) + 5
            ));
    }

    public static function deserialize(array $input): Pokemon
    {
        $pokemon = $input["pokemon"];
        $name = $input["name"];
        $level = $input["level"];
        $max_health = $input["health"];
        $attack = $input["attack"];
        $defence = $input["defence"];
        $moves = [];
        $types = [];



        foreach ($input["moves"] as $move) {
            $moves[] = Move::deserialize($move);
        }
        for($int = 0; $int < sizeof($input["types"]); $int++){
            $types[] = $input["types"][$int][0];
        }

        return new pokemon($pokemon, $name, $level, $max_health, $attack, $defence, $moves, $types);
    }

}