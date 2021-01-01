<?php

require 'classes/Types.php';
require 'classes/Move.php';
require 'classes/Pokemon.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokemon-2020</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="pokemon.css" >
</head>
<body>
<div id="container">
    <?php
    $typings = [];

    if(!empty($_POST["type"]))
    {
        foreach ($_POST["type"] as $type)
        {
            if ($type == "None")
            {
                continue;
            }
            else{
                $typings[] = $type;
            }

        }
    }

    if(!empty($_POST["pokebag1"]))
    {
        $pokebag[] = $_POST["pokebag1"];
        $pokebag[0] = json_decode($pokebag[0], true);
        $pokebag[0] = Pokemon::deserialize($pokebag[0]);
    }
    else
        {
        $pokebag = [];
    }


    if(!empty($_POST["pokemon"])){
        $pokebag[] = new Pokemon(
            $_POST["pokemon"], $_POST["name"], $_POST["level"], $_POST["max_health"], $_POST["attack"], $_POST["defence"],
            [
                new Move($_POST["moves"][0]["moveName"], (int)$_POST["moves"][0]["movePower"], $_POST["moves"][0]["moveType"]),
                new Move($_POST["moves"][1]["moveName"], (int)$_POST["moves"][1]["movePower"], $_POST["moves"][1]["moveType"]),
                new Move($_POST["moves"][2]["moveName"], (int)$_POST["moves"][2]["movePower"], $_POST["moves"][2]["moveType"]),
                new Move($_POST["moves"][3]["moveName"], (int)$_POST["moves"][3]["movePower"], $_POST["moves"][3]["moveType"]),
            ],
            $typings);
    }
    if (!isset($pokebag[0])) {
        ?>
        <h1>Pokemon 1</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="pokemon">Pokemon</label>
                <input type="text" class="form-control" id="pokemon" name="pokemon">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <input type="number" class="form-control" id="level" name="level">
            </div>
            <div class="form-group">
                <label for="max_health">Health stat</label>
                <input type="number" class="form-control" id="max_health" name="max_health">
            </div>
            <div class="form-group">
                <label for="attack">Attack stat</label>
                <input type="number" class="form-control" id="attack" name="attack">
            </div>
            <div class="form-group">
                <label for="defence">Defence stat</label>
                <input type="number" class="form-control" id="defence" name="defence">
            </div>
            <div class="form-group">
                <label for="moves">Moves</label><br>
                <label for="moves">Move 1</label>
                <div class="form-row" id="moves">
                    <div class="col-md-3 mb-3">
                        <label for="moveName">Move Name</label>
                        <input type="text" class="form-control" id="moveName" name="moves[0][moveName]" placeholder="Ember">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="movePower">Move Power</label>
                        <input type="number" class="form-control" id="movePower" name="moves[0][movePower]" placeholder="60">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="moveType">Move Type</label>
                        <select id="moveType" class="form-control" name="moves[0][moveType]">
                            <?php
                            $types = Types::getTypes();
                            foreach ($types as $type) {

                                ?>

                                <option><?= $type[0]; ?></option>

                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <label for="moves">Move 2</label>
                <div class="form-row" id="moves">
                    <div class="col-md-3 mb-3">
                        <label for="moveName">Move Name</label>
                        <input type="text" class="form-control" id="moveName" name="moves[1][moveName]"
                               placeholder="Ember">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="movePower">Move Power</label>
                        <input type="number" class="form-control" id="movePower" name="moves[1][movePower]"
                               placeholder="60">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="moveType">Move Type</label>
                        <select id="moveType" class="form-control" name="moves[1][moveType]">
                            <?php
                            $types = Types::getTypes();
                            foreach ($types as $type) {

                                ?>

                                <option><?= $type[0]; ?></option>

                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <label for="moves">Move 3</label>
                <div class="form-row" id="moves">
                    <div class="col-md-3 mb-3">
                        <label for="moveName">Move Name</label>
                        <input type="text" class="form-control" id="moveName" name="moves[2][moveName]"
                               placeholder="Ember">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="movePower">Move Power</label>
                        <input type="number" class="form-control" id="movePower" name="moves[2][movePower]"
                               placeholder="60">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="moveType">Move Type</label>
                        <select id="moveType" class="form-control" name="moves[2][moveType]">
                            <?php
                            $types = Types::getTypes();
                            foreach ($types as $type) {

                                ?>

                                <option><?= $type[0]; ?></option>

                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <label for="moves">Move 4</label>
                <div class="form-row" id="moves">
                    <div class="col-md-3 mb-3">
                        <label for="moveName">Move Name</label>
                        <input type="text" class="form-control" id="moveName" name="moves[3][moveName]"
                               placeholder="Ember">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="movePower">Move Power</label>
                        <input type="number" class="form-control" id="movePower" name="moves[3][movePower]"
                               placeholder="60">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="moveType">Move Type</label>
                        <select id="moveType" class="form-control" name="moves[3][moveType]">
                            <?php
                            $types = Types::getTypes();
                            foreach ($types as $type) {

                                ?>

                                <option><?= $type[0]; ?></option>

                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="types">Types</label><br>
                <div class="form-row" id="types">
                    <div class="col-md-3 mb-3">
                        <label for="type">Type 1</label>
                        <select id="moveType" class="form-control" name="type[0]">
                            <?php
                            $types = Types::getTypes();
                            foreach ($types as $type) {

                                ?>

                                <option><?= $type[0]; ?></option>

                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="type">Type 2</label>
                        <select id="type" class="form-control" name="type[1]">
                            <?php
                            $types = Types::getTypes();
                            foreach ($types as $type) {

                                ?>

                                <option><?= $type[0]; ?></option>

                                <?php
                            }
                            ?>
                            <option>None</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <?php
    }
    elseif(!isset($pokebag[1]))
    {
        ?>
    <h1>Pokemon 2</h1>
    <form action="" method="POST">
        <input id="hidden" name="pokebag1" value='<?=$pokebag[0]?>'>
        <div class="form-group">
            <label for="pokemon">Pokemon</label>
            <input type="text" class="form-control" id="pokemon" name="pokemon">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="level">Level</label>
            <input type="number" class="form-control" id="level" name="level">
        </div>
        <div class="form-group">
            <label for="max_health">Health stat</label>
            <input type="number" class="form-control" id="max_health" name="max_health">
        </div>
        <div class="form-group">
            <label for="attack">Attack stat</label>
            <input type="number" class="form-control" id="attack" name="attack">
        </div>
        <div class="form-group">
            <label for="defence">Defence stat</label>
            <input type="number" class="form-control" id="defence" name="defence">
        </div>
        <div class="form-group">
            <label for="moves">Moves</label><br>
            <label for="moves">Move 1</label>
            <div class="form-row" id="moves">
                <div class="col-md-3 mb-3">
                    <label for="moveName">Move Name</label>
                    <input type="text" class="form-control" id="moveName" name="moves[0][moveName]" placeholder="Ember">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="movePower">Move Power</label>
                    <input type="number" class="form-control" id="movePower" name="moves[0][movePower]" placeholder="60">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="moveType">Move Type</label>
                    <select id="moveType" class="form-control" name="moves[0][moveType]">
                        <?php
                        $types = Types::getTypes();
                        foreach ($types as $type) {

                            ?>

                            <option><?= $type[0]; ?></option>

                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <label for="moves">Move 2</label>
            <div class="form-row" id="moves">
                <div class="col-md-3 mb-3">
                    <label for="moveName">Move Name</label>
                    <input type="text" class="form-control" id="moveName" name="moves[1][moveName]"
                           placeholder="Ember">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="movePower">Move Power</label>
                    <input type="number" class="form-control" id="movePower" name="moves[1][movePower]"
                           placeholder="60">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="moveType">Move Type</label>
                    <select id="moveType" class="form-control" name="moves[1][moveType]">
                        <?php
                        $types = Types::getTypes();
                        foreach ($types as $type) {

                            ?>

                            <option><?= $type[0]; ?></option>

                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <label for="moves">Move 3</label>
            <div class="form-row" id="moves">
                <div class="col-md-3 mb-3">
                    <label for="moveName">Move Name</label>
                    <input type="text" class="form-control" id="moveName" name="moves[2][moveName]"
                           placeholder="Ember">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="movePower">Move Power</label>
                    <input type="number" class="form-control" id="movePower" name="moves[2][movePower]"
                           placeholder="60">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="moveType">Move Type</label>
                    <select id="moveType" class="form-control" name="moves[2][moveType]">
                        <?php
                        $types = Types::getTypes();
                        foreach ($types as $type) {

                            ?>

                            <option><?= $type[0]; ?></option>

                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <label for="moves">Move 4</label>
            <div class="form-row" id="moves">
                <div class="col-md-3 mb-3">
                    <label for="moveName">Move Name</label>
                    <input type="text" class="form-control" id="moveName" name="moves[3][moveName]"
                           placeholder="Ember">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="movePower">Move Power</label>
                    <input type="number" class="form-control" id="movePower" name="moves[3][movePower]"
                           placeholder="60">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="moveType">Move Type</label>
                    <select id="moveType" class="form-control" name="moves[3][moveType]">
                        <?php
                        $types = Types::getTypes();
                        foreach ($types as $type) {

                            ?>

                            <option><?= $type[0]; ?></option>

                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="types">Types</label><br>
            <div class="form-row" id="types">
                <div class="col-md-3 mb-3">
                    <label for="type">Type 1</label>
                    <select id="moveType" class="form-control" name="type[0]">
                        <?php
                        $types = Types::getTypes();
                        foreach ($types as $type) {

                            ?>

                            <option><?= $type[0]; ?></option>

                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="type">Type 2</label>
                    <select id="type" class="form-control" name="type[1]">
                        <?php
                        $types = Types::getTypes();
                        foreach ($types as $type) {

                            ?>

                            <option><?= $type[0]; ?></option>

                            <?php
                        }
                        ?>
                        <option>None</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <?php }
    else {

        foreach ($pokebag as $pok) {
            ?>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" style="height: 350px; width: 100%" src="<?php echo $pok->url ?>"
                     alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $pok->name . ' (' . $pok->pokemon . ') ' . $pok->level; ?></h5>
                    <p class="card-text"><?php foreach ($pok->types as $type) {
                            echo $type[0] . ' ';
                        }
                        echo '<br> Health: <span class="movedamage">' . $pok->health . '</span><br>Attack: <span class="movedamage">' . $pok->attack . '<br></span><br>Defence: <span class="movedamage">' . $pok->defence . '<br>' ?></span></p>
                </div>
                <ul class="list-group list-group-flush">
                    <?php foreach ($pok->moves as $move) {
                        echo '<li class="list-group-item"><span class="movename">' . $move->name . '</span> <span class="movetype">' .
                            $move->type[0] . '</span> <span class="movedamage">' .
                            $move->power .

                            '</span></li>';
                    } ?>
                </ul>
            </div>

        <?php }
        $pokebag[0]->attack($pokebag[0]->moves[1], $pokebag[1]);
        $pokebag[1]->attack($pokebag[1]->moves[3], $pokebag[0]);


    }?>

</div>

</body>
</html>
