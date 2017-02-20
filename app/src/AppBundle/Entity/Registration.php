<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Registration
 *
 * @ORM\Table(name="registration", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
 */
class Registration
{
    /**
     * @var string
     *
     * @ORM\Column(name="imie", type="string", length=255, nullable=true)
     */
    private $imie;

    /**
     * @var string
     *
     * @ORM\Column(name="nazwisko", type="string", length=255, nullable=true)
     */
    private $nazwisko;

    /**
     * @var string
     *
     * @ORM\Column(name="telefon", type="string", length=13, nullable=true)
     */
    private $telefon;

    /**
     * @var string
     *
     * @ORM\Column(name="tor", type="string", length=1, nullable=true)
     */
    private $tor;

    /**
     * @var string
     *
     * @ORM\Column(name="do", type="string", length=14, nullable=true)
     */
    private $do;

    /**
     * @var string
     *
     * @ORM\Column(name="od", type="string", length=5, nullable=true)
     */
    private $od;

    /**
     * @var string
     *
     * @ORM\Column(name="data_rezerwacji", type="string", length=20, nullable=true)
     */
    private $dataRezerwacji;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime", nullable=true)
     */
    private $timestamp;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}
