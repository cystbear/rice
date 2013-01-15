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
        return $this->card;
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





