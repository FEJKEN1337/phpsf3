<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rooms
 */
class Rooms
{
    /**
     * @var integer
     */
    private $placeToStore;

    /**
     * @var string
     */
    private $image;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set placeToStore
     *
     * @param integer $placeToStore
     * @return Rooms
     */
    public function setPlaceToStore($placeToStore)
    {
        $this->placeToStore = $placeToStore;

        return $this;
    }

    /**
     * Get placeToStore
     *
     * @return integer 
     */
    public function getPlaceToStore()
    {
        return $this->placeToStore;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Rooms
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
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
