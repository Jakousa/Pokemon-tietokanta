<?php

class Teammember {

    private $teamid;
    private $pokemonid;

    function __construct($teamid, $pokemonid) {
        $this->teamid = $teamid;
        $this->pokemonid = $pokemonid;
    }

    public function getTeamid() {
        return $this->teamid;
    }

    public function setTeamid($teamid) {
        $this->teamid = $teamid;
    }

    public function getPokemonid() {
        return $this->pokemonid;
    }

    public function setPokemonid($pokemonid) {
        $this->pokemonid = $pokemonid;
    }

    public function etsiTiimi($team) {
        require_once "libs/tietokantayhteys.php";
        $sql = "SELECT * FROM teammember WHERE teamid = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($tiimi->getId()));

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
            $pokemon->setSpattack($tulos->spattack);
            $pokemon->setSpdefense($tulos->spdefense);
            $pokemon->setSpeed($tulos->speed);

            $tulokset[] = $pokemon;
        }
        return $tulokset;
    }

}
