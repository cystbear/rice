<?php

namespace Rice\GlueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table()
 * @ORM\Entity()
 */
class Project
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="Contributor", inversedBy="projects")
     **/
    private $contributors;

    public function __construct() {
        $this->contributors = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setContributors($contributors)
    {
        $this->contributors = $contributors;
    }
    public function getContributors()
    {
        return $this->contributors ?: $this->contributors = new ArrayCollection();
    }
    public function addContributor($contributor)
    {
        return $this->getContributors()->add($contributor);
    }

}
