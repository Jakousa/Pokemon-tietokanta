<?php

class Team {

    private $id;
    private $name;
    private $ownerid;
    private $virheet = array();

    function __construct($id, $name, $ownerid) {
        $this->id = $id;
        $this->name = $name;
        $this->ownerid = $ownerid;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getOwnerid() {
        return $this->ownerid;
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

    public function setOwnerid($ownerid) {
        $this->ownerid = $ownerid;
    }

    public function etsiKaikkiTiimitOmistajalla($ownerid) {
        require_once "libs/tietokantayhteys.php";
        $sql = "SELECT id, name FROM team WHERE ownerid = ? ORDER BY id";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($ownerid));

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $tiimi = new Team();
            $tiimi->setId($tulos->id);
            $tiimi->setName($tulos->name);
            $tiimi->setOwnerid($tulos->ownerid);

            $tulokset[] = $tiimi;
        }
        return $tulokset;
    }

    public function lisaaKantaan() {
        require_once "libs/tietokantayhteys.php";
        $sql = "INSERT INTO team(name, ownerid) VALUES(?,?) RETURNING id";

        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->getName(), $this->getOwnerid()));
        if ($ok) {
            //Haetaan RETURNING-määreen palauttama id.
            //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
            $this->id = $kysely->fetchColumn();
        }
        return $ok;
    }

    public function poistaOlemasta($teamid) {
        require_once "libs/tietokantayhteys.php";
        $sql = "DELETE FROM team WHERE id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($teamid));
    }

    public function onkoKelvollinen() {
        return empty($this->virheet);
    }

    public function getVirheet() {
        return $this->virheet;
    }

}