<?php

namespace Rice\DeckKeeperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Card
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rice\DeckKeeperBundle\Entity\CardRepository")
 */
class Card
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="cardSet", nullable=true, type="string", length=255)
     */
    private $cardSet;

    /**
     * @var string
     *
     * @ORM\Column(name="manaCost", nullable=true, type="string", length=255)
     */
    private $manaCost;

    /**
     * @var string
     *
     * @ORM\Column(name="image", nullable=true, type="string", length=255)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="type", nullable=true, type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="artisticDescription", nullable=true, type="string", length=255)
     */
    private $artisticDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="artist", nullable=true, type="string", length=255)
     */
    private $artist;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", nullable=true, type="integer")
     */
    private $number;


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
     * Set name
     *
     * @param string $name
     * @return Card
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
     * Set cardSet
     *
     * @param string $cardSet
     * @return Card
     */
    public function setCardSet($cardSet)
    {
        $this->cardSet = $cardSet;

        return $this;
    }

    /**
     * Get cardSet
     *
     * @return string
     */
    public function getCardSet()
    {
        return $this->cardSet;
    }

    /**
     * Set manaCost
     *
     * @param string $manaCost
     * @return Card
     */
    public function setManaCost($manaCost)
    {
        $this->manaCost = $manaCost;

        return $this;
    }

    /**
     * Get manaCost
     *
     * @return string
     */
    public function getManaCost()
    {
        return $this->manaCost;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Card
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
     * Set type
     *
     * @param string $type
     * @return Card
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set artisticDescription
     *
     * @param string $artisticDescription
     * @return Card
     */
    public function setArtisticDescription($artisticDescription)
    {
        $this->artisticDescription = $artisticDescription;

        return $this;
    }

    /**
     * Get artisticDescription
     *
     * @return string
     */
    public function getArtisticDescription()
    {
        return $this->artisticDescription;
    }

    /**
     * Set artist
     *
     * @param string $artist
     * @return Card
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist
     *
     * @return string
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return Card
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }
}
