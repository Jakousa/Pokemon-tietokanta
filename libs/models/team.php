<?php


class Team{

    private $id;
    private $name;
    private $owner;
    
    function __construct($id, $name, $owner) {
        $this->id = $id;
        $this->name = $name;
        $this->owner = $owner;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getOwner() {
        return $this->owner;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setOwner($owner) {
        $this->owner = $owner;
    }
}