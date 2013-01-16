<?php

namespace Rice\DeckKeeperBundle\Proxy;

use Symfony\Component\Validator\Constraints as Assert;
use Rice\DeckKeeperBundle\Entity\Card;

class CardProxy
{
    private $card;

    /**
     * @Assert\File(maxSize=6000000)
     */
    public $imageFile;

    public $removeImage = false;

    public function __construct(Card $card)
    {
        $this->card = $card;
    }

    public function getCard()
    {
        return $this->card->translate();
    }

    public function setManaCost($manaCost)
    {
        $this->card->setManaCost($manaCost);
    }
    public function getManaCost()
    {
        return $this->card->getManaCost();
    }
    public function setCardSet($cardSet)
    {
        $this->card->setCardSet($cardSet);
    }
    public function getCardSet()
    {
        return $this->card->getCardSet();
    }
    public function setRarity($rarity)
    {
        $this->card->setRarity($rarity);
    }
    public function getRarity()
    {
        return $this->card->getRarity();
    }
    public function setPower($power)
    {
        $this->card->setPower($power);
    }
    public function getPower()
    {
        return $this->card->getPower();
    }
    public function setToughness($toughness)
    {
        $this->card->setToughness($toughness);
    }
    public function getToughness()
    {
        return $this->card->getToughness();
    }
    public function setArtist($artist)
    {
        $this->card->setArtist($artist);
    }
    public function getArtist()
    {
        return $this->card->getArtist();
    }
    public function setNumber($number)
    {
        $this->card->setNumber($number);
    }
    public function getNumber()
    {
        return $this->card->getNumber();
    }

    public function getNameEn()
    {
        return $this->card->translate()->getName();
    }
    public function setNameEn($name)
    {
        $this->card->translate()->setName($name);
    }
    public function getNameRu()
    {
        return $this->card->translate('ru')->getName();
    }
    public function setNameRu($name)
    {
        $this->card->translate('ru')->setName($name);
    }

    public function getTypeEn()
    {
        return $this->card->translate()->getType();
    }
    public function setTypeEn($type)
    {
        $this->card->translate()->setType($type);
    }
    public function getTypeRu()
    {
        return $this->card->translate('ru')->getType();
    }
    public function setTypeRu($type)
    {
        $this->card->translate('ru')->setType($type);
    }

    public function getSubTypeEn()
    {
        return $this->card->translate()->getSubType();
    }
    public function setSubTypeEn($subType)
    {
        $this->card->translate()->setSubType($subType);
    }
    public function getSubTypeRu()
    {
        return $this->card->translate('ru')->getSubType();
    }
    public function setSubTypeRu($subType)
    {
        $this->card->translate('ru')->setSubType($subType);
    }

    public function getDescriptionEn()
    {
        return $this->card->translate()->getDescription();
    }
    public function setDescriptionEn($description)
    {
        $this->card->translate()->setDescription($description);
    }
    public function getDescriptionRu()
    {
        return $this->card->translate('ru')->getDescription();
    }
    public function setDescriptionRu($description)
    {
        $this->card->translate('ru')->setDescription($description);
    }

    public function getArtisticdescriptionEn()
    {
        return $this->card->translate()->getArtisticdescription();
    }
    public function setArtisticdescriptionEn($artisticdescription)
    {
        $this->card->translate()->setArtisticdescription($artisticdescription);
    }
    public function getArtisticdescriptionRu()
    {
        return $this->card->translate('ru')->getArtisticdescription();
    }
    public function setArtisticdescriptionRu($artisticdescription)
    {
        $this->card->translate('ru')->setArtisticdescription($artisticdescription);
    }

    public function evaluateUpload()
    {
        if (($oldImage = $this->getCard()->getImage(true)) && $this->removeImage) {
            unlink($oldImage);
            $this->getCard()->setImage($oldImage = null);
        }

        if (null === $this->imageFile) {
            return;
        }

        // remove old image
        if ($oldImage) {
            unlink($oldImage);
        }

        $imagesPath = $this->getCard()->getImagesPath(true);
        if (!is_dir($imagesPath)) {
            mkdir($imagesPath, 0777, true);
        }

        $imageName = md5(uniqid().$this->getCard()->getName()).'.'.$this->imageFile->guessExtension();

        $this->imageFile->move($imagesPath, $imageName);
        $this->getCard()->setImage($imageName);
    }


}





