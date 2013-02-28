<?php

namespace Rice\GlueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity()
 */
class Cart
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Customer", inversedBy="cart")
     **/
    private $customer;

    public function getId()
    {
        return $this->id;
    }

    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }
    public function getCustomer()
    {
        return $this->customer;
    }
}
