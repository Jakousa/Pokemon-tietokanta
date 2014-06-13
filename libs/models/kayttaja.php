<?php

class Kayttaja {

    private $id;
    private $tunnus;
    private $salasana;
    private $virheet = array();

    public function __construct($id, $tunnus, $salasana) {
        $this->id = $id;
        $this->tunnus = $tunnus;
        $this->salasana = $salasana;
    }

    public function getId() {
        return $this->id;
    }

    public function getTunnus() {
        return $this->tunnus;
    }

    public function getSalasana() {
        return $this->salasana;
    }

    
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setTunnus($tunnus) {
        $this->tunnus = $tunnus;

        if (trim($this->tunnus) == '') {
            $this->virheet['tunnus'] = "Username cannot be empty";
        } else if (strlen($this->tunnus) > 20) {
            $this->virheet['tunnus'] = "Username has to be shorter than 20 characters";
        } else if (htmlspecialchars($this->tunnus) != $this->tunnus) {
            $this->virheet['tunnus'] = "Username cannot contain special characters";
        } else {
            unset($this->virheet['tunnus']);
        }
    }

    public function setSalasana($salasana) {
        $this->salasana = $salasana;
        
        if (trim($this->salasana) == '') {
            $this->virheet['salasana'] = "Password cannot be empty";
        } else if (strlen($this->salasana) > 20) {
            $this->virheet['salasana'] = "Password has to be shorter than 20 characters";
        } else if (htmlspecialchars($this->salasana) != $this->salasana) {
            $this->virheet['salasana'] = "Password cannot contain special characters";
        } else {
            unset($this->virheet['salasana']);
        }
    }

    /* Etsitään kannasta käyttäjätunnuksella ja salasanalla käyttäjäriviä */
    public static function etsiKayttajaTunnuksilla($kayttaja, $salasana) {
        require_once "libs/tietokantayhteys.php";
        $sql = "SELECT id, username, password from users where username = ? AND password = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kayttaja, $salasana));

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
            $kayttaja = new Kayttaja();
            $kayttaja->setId($tulos->id);
            $kayttaja->setTunnus($tulos->username);
            $kayttaja->setSalasana($tulos->password);

            return $kayttaja;
        }
    }
    
    /* Etsitään kannasta pelkällä käyttäjätunnuksella käyttäjäriviä */
    public static function etsiKayttajaTunnuksella($kayttaja) {
        require_once "libs/tietokantayhteys.php";
        $sql = "SELECT id, username from users where username = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kayttaja));

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
            $kayttaja = new Kayttaja();
            $kayttaja->setId($tulos->id);
            $kayttaja->setTunnus($tulos->username);

            return $kayttaja;
        }
    }

    public static function etsiKaikkiKayttajat() {
        $sql = "SELECT id, username, password FROM users";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $kayttaja = new Kayttaja();
            $kayttaja->setId($tulos->id);
            $kayttaja->setTunnus($tulos->username);
            $kayttaja->setSalasana($tulos->password);

            //$array[] = $muuttuja; lisää muuttujan arrayn perään. 
            //Se vastaa melko suoraan ArrayList:in add-metodia.
            $tulokset[] = $kayttaja;
        }
        return $tulokset;
    }

    public function lisaaKantaan() {
        require_once "libs/tietokantayhteys.php";
        $sql = "INSERT INTO users(username, password) VALUES(?,?) RETURNING id";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->getTunnus(), $this->getSalasana()));
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