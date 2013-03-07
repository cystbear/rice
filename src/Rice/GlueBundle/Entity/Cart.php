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
     * @ORM\Column(name="amount", type="string", length=255)
     */
    private $amount;

    /**
     * @ORM\OneToOne(targetEntity="Customer", inversedBy="cart")
     **/
    private $customer;

    public function getId()
    {
        return $this->id;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
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
