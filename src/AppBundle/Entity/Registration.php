<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Registration
 */
class Registration
{
    /**
     * @var string
     */
    private $imie;

    /**
     * @var string
     */
    private $nazwisko;

    /**
     * @var string
     */
    private $telefon;

    /**
     * @var string
     */
    private $tor;

    /**
     * @var string
     */
    private $do;

    /**
     * @var string
     */
    private $od;

    /**
     * @var string
     */
    private $dataRezerwacji;

    /**
     * @var \DateTime
     */
    private $timestamp;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set imie
     *
     * @param string $imie
     * @return Registration
     */
    public function setImie($imie)
    {
        $this->imie = $imie;

        return $this;
    }

    /**
     * Get imie
     *
     * @return string 
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * Set nazwisko
     *
     * @param string $nazwisko
     * @return Registration
     */
    public function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;

        return $this;
    }

    /**
     * Get nazwisko
     *
     * @return string 
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    /**
     * Set telefon
     *
     * @param string $telefon
     * @return Registration
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;

        return $this;
    }

    /**
     * Get telefon
     *
     * @return string 
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * Set tor
     *
     * @param string $tor
     * @return Registration
     */
    public function setTor($tor)
    {
        $this->tor = $tor;

        return $this;
    }

    /**
     * Get tor
     *
     * @return string 
     */
    public function getTor()
    {
        return $this->tor;
    }

    /**
     * Set do
     *
     * @param string $do
     * @return Registration
     */
    public function setDo($do)
    {
        $this->do = $do;

        return $this;
    }

    /**
     * Get do
     *
     * @return string 
     */
    public function getDo()
    {
        return $this->do;
    }

    /**
     * Set od
     *
     * @param string $od
     * @return Registration
     */
    public function setOd($od)
    {
        $this->od = $od;

        return $this;
    }

    /**
     * Get od
     *
     * @return string 
     */
    public function getOd()
    {
        return $this->od;
    }

    /**
     * Set dataRezerwacji
     *
     * @param string $dataRezerwacji
     * @return Registration
     */
    public function setDataRezerwacji($dataRezerwacji)
    {
        $this->dataRezerwacji = $dataRezerwacji;

        return $this;
    }

    /**
     * Get dataRezerwacji
     *
     * @return string 
     */
    public function getDataRezerwacji()
    {
        return $this->dataRezerwacji;
    }

    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     * @return Registration
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
