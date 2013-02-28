<?php

namespace Rice\GlueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity()
 */
class Feature
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Dream", inversedBy="features")
     **/
    private $dream;

    public function getId()
    {
        return $this->id;
    }

    public function setDream($dream)
    {
        $this->dream = $dream;
    }
    public function getDream()
    {
        return $this->dream;
    }
}
