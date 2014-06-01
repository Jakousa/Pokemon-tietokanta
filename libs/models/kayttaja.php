<?php

class Kayttaja {

    private $id;
    private $tunnus;
    private $salasana;

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
    }

    public function setSalasana($salasana) {
        $this->salasana = $salasana;
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

    /* Kirjoita tähän gettereitä ja settereitä */
}