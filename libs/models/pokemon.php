<?php

class Pokemon {

    private $id;
    private $name;
    private $type1;
    private $type2;
    private $hp;
    private $attack;
    private $defense;
    private $spattack;
    private $spdefense;
    private $speed;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getType1() {
        return $this->type1;
    }

    public function getType2() {
        return $this->type2;
    }

    public function getHp() {
        return $this->hp;
    }

    public function getAttack() {
        return $this->attack;
    }

    public function getDefense() {
        return $this->defense;
    }

    public function getSpattack() {
        return $this->spattack;
    }

    public function getSpdefense() {
        return $this->spdefense;
    }

    public function getSpeed() {
        return $this->speed;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setType1($type1) {
        $this->type1 = $type1;
    }

    public function setType2($type2) {
        $this->type2 = $type2;
    }

    public function setHp($hp) {
        $this->hp = $hp;
    }

    public function setAttack($attack) {
        $this->attack = $attack;
    }

    public function setDefense($defense) {
        $this->defense = $defense;
    }

    public function setSpattack($spattack) {
        $this->spattack = $spattack;
    }

    public function setSpdefense($spdefense) {
        $this->spdefense = $spdefense;
    }

    public function setSpeed($speed) {
        $this->speed = $speed;
    }

    public static function etsiPokemonNimesta($part) {
        require_once "libs/tietokantayhteys.php";
        $sql = "SELECT id, name, type1, type2, hp, attack, defense, spattack, spdefense, speed FROM pokemon WHERE name LIKE ? ORDER BY id";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array('%' . $part . '%'));

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

    public static function etsiPokemonNimella($nimi) {
        require_once "libs/tietokantayhteys.php";
        $sql = "SELECT id, name, type1, type2, hp, attack, defense, spattack, spdefense, speed FROM pokemon WHERE name = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($nimi));

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
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

            return $pokemon;
        }
    }

    public static function etsiPokemonIdlla($id) {
        require_once "libs/tietokantayhteys.php";
        $sql = "SELECT id, name, type1, type2, hp, attack, defense, spattack, spdefense, speed FROM pokemon WHERE id = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($id));

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
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

            return $pokemon;
        }
    }

    public static function etsiKaikkiPokemonit() {
        require_once "libs/tietokantayhteys.php";
        $sql = "SELECT * FROM pokemon ORDER BY id";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

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
