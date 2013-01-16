<?php

namespace Rice\DeckKeeperBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class CardSetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'Set'))
            ->add('year', 'integer', array('label' => 'Year'))
        ;
    }

    public function getName()
    {
        return 'card';
    }
}
