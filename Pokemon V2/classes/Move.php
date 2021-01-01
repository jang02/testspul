<?php


class Move{
    public $name;
    public $power;
    public $type;

    public function __construct($name, $power, $type){
        $this->name = $name;
        $this->power = $power;
        $this->type = Types::getTypeFromName($type);
    }

    public static function deserialize(array $input): Move {
        $name = $input["name"];
        $power = $input["power"];
        $type = $input["type"][0];

        return new move($name, $power, $type);
    }
}