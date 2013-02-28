<?php

namespace Rice\GlueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table()
 * @ORM\Entity()
 */
class Contributor
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="Project", mappedBy="contributors")
     **/
    private $projects;

    public function __construct() {
        $this->projects = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setProjects($projects)
    {
        $this->projects = $projects;
    }
    public function getProjects()
    {
        return $this->projects ?: $this->projects = new ArrayCollection();
    }

    public function addProject($project)
    {
        $project->getContributors()->add($this);
        $this->getProjects()->add($project);
    }
}
