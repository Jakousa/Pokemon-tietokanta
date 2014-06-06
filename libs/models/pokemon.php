<?php

class pokemon {
    
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
}
