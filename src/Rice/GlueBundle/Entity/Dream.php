<?php

namespace Rice\GlueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table()
 * @ORM\Entity()
 */
class Dream
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Feature", mappedBy="dream")
     **/
    private $features;

    public function __construct() {
        $this->features = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setFeatures($features)
    {
        $this->features = $features;
    }
    public function getFeatures()
    {
        return $this->features;
    }


}
