<?php

class Team {

    private $id;
    private $name;
    private $owner;
    private $virheet = array();

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

        if (trim($this->name) == '') {
            $this->virheet['tiiminnimi'] = "Team has to have a name";
        } else if (strlen($this->name) > 20) {
            $this->virheet['tiiminnimi'] = "Teamname has to be shorter than 20 characters";
        } else if (htmlspecialchars($this->name) != $this->name) {
            $this->virheet['tiiminnimi'] = "Teamname cannot contain special characters";
        } else {
            unset($this->virheet['tiiminnimi']);
        }
    }

    public function setOwner($owner) {
        $this->owner = $owner;
    }

    public function lisaaKantaan($omistaja) {
        require_once "libs/tietokantayhteys.php";
        $sql = "INSERT INTO team(name, ownerid) VALUES(?,?) RETURNING id";
        
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->getName(), $omistaja));
        if ($ok) {
            //Haetaan RETURNING-määreen palauttama id.
            //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
            $this->id = $kysely->fetchColumn();
        }
        return $ok;
        
    }

    public function onkoKelvollinen() {
        return empty($this->virheet);
    }

    public function getVirheet() {
        return $this->virheet;
    }

}