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

    
    public function etsiOmistajanKaikkiPokemonit($ownerid) {
        
    }
    
    public function etsiOmistajanPokemonitNimenOsalla($ownerid, $part) {
        
    }
}
