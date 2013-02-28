<?php

namespace Rice\GlueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity()
 */
class Customer
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Cart", mappedBy="customer")
     */
    private $cart;

    public function getId()
    {
        return $this->id;
    }

    public function setCart($cart)
    {
        $this->cart = $cart;
    }
    public function getCart()
    {
        return $this->cart;
    }

}
