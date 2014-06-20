<?php

class Ownedpokemon {

    private $ownerid;
    private $pokemonid;
    private $shiny;

    function __construct($ownerid, $pokemonid, $shiny) {
        $this->ownerid = $ownerid;
        $this->pokemonid = $pokemonid;
        $this->shiny = $shiny;
    }

    public function getOwnerid() {
        return $this->ownerid;
    }

    public function setOwnerid($ownerid) {
        $this->ownerid = $ownerid;
    }

    public function getPokemonid() {
        return $this->pokemonid;
    }

    public function setPokemonid($pokemonid) {
        $this->pokemonid = $pokemonid;
    }

    public function getShiny() {
        return $this->shiny;
    }

    public function setShiny($shiny) {
        $this->shiny = $shiny;
    }

    public function lisaaKantaan() {
        require_once "libs/tietokantayhteys.php";
        $sql = "INSERT INTO ownedpokemon(ownerid, pokemonid, shiny) VALUES(?,?,?)";

        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->getOwnerid(), $this->getPokemonid(), $this->getShiny()));
        if ($ok) {
            //Haetaan RETURNING-määreen palauttama id.
            //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
            $this->id = $kysely->fetchColumn();
        }
        return $ok;
    }

    public function poistaOlemasta($ownerid, $pokemonid) {
        require_once "libs/tietokantayhteys.php";
        $sql = "DELETE FROM ownedpokemon WHERE ownerid = ? AND pokemonid = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($ownerid, $pokemonid));
    }

    public function etsiOmistajanPokemonIdlla($ownerid, $pokemonid) {
        require_once "libs/tietokantayhteys.php";
        $sql = "SELECT ownerid, pokemonid, shiny FROM ownedpokemon WHERE ownerid = ? AND pokemonid = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($ownerid, $pokemonid));

        $tulos = $kysely->fetchObject();
        if (is_null($tulos)) {
            return null;
        } else {
            return $tulos->shiny;
        }
    }

    public function etsiOmistajanKaikkiPokemonit($ownerid) {
        require_once "libs/tietokantayhteys.php";
        $sql = "SELECT pokemon.id, pokemon.name, type1, type2, hp, attack, defense, spattack, spdefense, speed FROM pokemon INNER JOIN ownedpokemon ON pokemon.id=ownedpokemon.pokemonid WHERE ownedpokemon.ownerid = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($ownerid));

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $pokemon = new Pokemon();
            $pokemon->setId($tulos->id);
            $pokemon->setName($tulos->name);
            $pokemon->setType1($tulos->type1);
            $pokemon->setType2($tulos->type2);
            $pokemon->setHp($tulos->hp);
            $pokemon->setAttack($tulos->attack);
            $pokemon->setDefense($tulos->defense);
            $pokemon->setSpattack($tulos->Spattack);
            $pokemon->setSpdefense($tulos->Spdefense);
            $pokemon->setSpeed($tulos->speed);

            $tulokset[] = $pokemon;
        }
        return $tulokset;
    }

    public function etsiOmistajanShinyPokemonit($ownerid) {
        require_once "libs/tietokantayhteys.php";
        $sql = "SELECT pokemon.id, pokemon.name, type1, type2, hp, attack, defense, spattack, spdefense, speed FROM pokemon INNER JOIN ownedpokemon ON pokemon.id=ownedpokemon.pokemonid WHERE ownedpokemon.ownerid = ? AND ownedpokemon.shiny = true";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($ownerid));

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $pokemon = new Pokemon();
            $pokemon->setId($tulos->id);
            $pokemon->setName($tulos->name);
            $pokemon->setType1($tulos->type1);
            $pokemon->setType2($tulos->type2);
            $pokemon->setHp($tulos->hp);
            $pokemon->setAttack($tulos->attack);
            $pokemon->setDefense($tulos->defense);
            $pokemon->setSpattack($tulos->Spattack);
            $pokemon->setSpdefense($tulos->Spdefense);
            $pokemon->setSpeed($tulos->speed);

            $tulokset[] = $pokemon;
        }
        return $tulokset;
    }

    public function etsiOmistajanPokemonitNimenOsalla($ownerid, $part) {
        require_once "libs/tietokantayhteys.php";
        $sql = "SELECT pokemon.id, pokemon.name, type1, type2, hp, attack, defense, spattack, spdefense, speed FROM pokemon INNER JOIN ownedpokemon ON pokemon.id=ownedpokemon.pokemonid WHERE ownedpokemon.ownerid = ? AND pokemon.name LIKE ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($ownerid, '%' . $part . '%'));

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $pokemon = new Pokemon();
            $pokemon->setId($tulos->id);
            $pokemon->setName($tulos->name);
            $pokemon->setType1($tulos->type1);
            $pokemon->setType2($tulos->type2);
            $pokemon->setHp($tulos->hp);
            $pokemon->setAttack($tulos->attack);
            $pokemon->setDefense($tulos->defense);
            $pokemon->setSpattack($tulos->Spattack);
            $pokemon->setSpdefense($tulos->Spdefense);
            $pokemon->setSpeed($tulos->speed);

            $tulokset[] = $pokemon;
        }
        return $tulokset;
    }

}
