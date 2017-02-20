<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Reservations
 */
class Reservations
{
    /**
     * @var integer
     */
    private $roomId;

    /**
     * @var string
     */
    /**
     * @Assert\NotBlank(message = "Imię nie może byc puste")
     * @Assert\Length(
     *      max = 20,
     *      maxMessage = "Imię nie może miec więcej niż 20 znaków"
     * )
     */
    private $name;

    /**
     * @var string
     */
    /**
     * @Assert\NotBlank(message = "Nazwisko nie może byc puste")
     * @Assert\Length(
     *      max = 20,
     *      maxMessage = "Nazwisko nie może miec więcej niż 20 znaków"
     * )
     */
    private $surname;

    /**
     * @var string
     */
    /**
     * @Assert\NotBlank(message = "Numer telefonu nie może byc pusty")
     * @Assert\Length(
     *      min = 7,
     *      maxMessage = "Numer telefonu nie może miec mniej niż 7 znaków",
     *      max = 9,
     *      maxMessage = "Numer telefonu nie może miec więcej niż 9 znaków"
     * )
     * @Assert\Type(
     *     type="numeric",
     *     message="Numer telefonu musi zawierać tylko liczby"
     * )
     */
    private $phone;

    /**
     * @var integer
     */
    /**
     * @Assert\NotBlank(message = "Data rezerwacji nie może byc pusta")
     * @Assert\GreaterThan(
     *      value = 0,
     *      message = "Błędna data rezerwacji"
     * )
     */
    private $reservationFrom;

    /**
     * @var integer
     */
    /**
     * @Assert\NotBlank(message = "Data zakończenia rezerwacji nie może byc pusta")
     */
    
    private $reservationTo;

    /**
     * @var integer
     */
    /**
     * @Assert\GreaterThan(
     *      value = 0,
     *      message = "Liczba dni musi być większa od zera"
     * )
     * @Assert\LessThanOrEqual(
     *     value = 14,
      *     message = "Liczba dni nie może byc większa niż 14"
     * )
     */
    private $ammountOfDays;

    /**
     * @var integer
     */
    /**
     * @Assert\GreaterThan(
     *      value = 0,
     *      message = "Liczba osób musi być większa od zera"
     * )
     * @Assert\LessThanOrEqual(
     *     value = 14,
      *     message = "Liczba osób nie może byc większa niż 14"
     * )
     */
    private $ammountOfPeople;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set roomId
     *
     * @param integer $roomId
     * @return Reservations
     */
    public function setRoomId($roomId)
    {
        $this->roomId = $roomId;

        return $this;
    }

    /**
     * Get roomId
     *
     * @return integer 
     */
    public function getRoomId()
    {
        return $this->roomId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Reservations
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return Reservations
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Reservations
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set reservationFrom
     *
     * @param integer $reservationFrom
     * @return Reservations
     */
    public function setReservationFrom($reservationFrom)
    {
        $this->reservationFrom = $reservationFrom;

        return $this;
    }

    /**
     * Get reservationFrom
     *
     * @return integer 
     */
    public function getReservationFrom()
    {
        return $this->reservationFrom;
    }

    /**
     * Set reservationTo
     *
     * @param integer $reservationTo
     * @return Reservations
     */
    public function setReservationTo($reservationTo)
    {
        $this->reservationTo = $reservationTo;

        return $this;
    }

    /**
     * Get reservationTo
     *
     * @return integer 
     */
    public function getReservationTo()
    {
        return $this->reservationTo;
    }

    /**
     * Set ammountOfDays
     *
     * @param integer $ammountOfDays
     * @return Reservations
     */
    public function setAmmountOfDays($ammountOfDays)
    {
        $this->ammountOfDays = $ammountOfDays;

        return $this;
    }

    /**
     * Get ammountOfDays
     *
     * @return integer 
     */
    public function getAmmountOfDays()
    {
        return $this->ammountOfDays;
    }

    /**
     * Set ammountOfPeople
     *
     * @param integer $ammountOfPeople
     * @return Reservations
     */
    public function setAmmountOfPeople($ammountOfPeople)
    {
        $this->ammountOfPeople = $ammountOfPeople;

        return $this;
    }

    /**
     * Get ammountOfPeople
     *
     * @return integer 
     */
    public function getAmmountOfPeople()
    {
        return $this->ammountOfPeople;
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
    /**
     * @var \AppBundle\Entity\Rooms
     */
    private $room;


    /**
     * Set room
     *
     * @param \AppBundle\Entity\Rooms $room
     * @return Reservations
     */
    public function setRoom(\AppBundle\Entity\Rooms $room = null)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Get room
     *
     * @return \AppBundle\Entity\Rooms 
     */
    public function getRoom()
    {
        return $this->room;
    }
}
