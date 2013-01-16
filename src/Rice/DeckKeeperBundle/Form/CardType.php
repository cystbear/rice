<?php

namespace Rice\DeckKeeperBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class CardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameEn', 'text', array('label' => 'Name (en)'))
            ->add('nameRu', 'text', array('label' => 'Name (ru)'))
            ->add('typeEn', 'text', array('label' => 'Type (en)'))
            ->add('typeRu', 'text', array('label' => 'Type (ru)'))
            ->add('subTypeEn', 'text', array('label' => 'Sub Type (en)'))
            ->add('subTypeRu', 'text', array('label' => 'Sub Type (ru)'))
            ->add('descriptionEn', 'textarea', array('label' => 'Description (en)'))
            ->add('descriptionRu', 'textarea', array('label' => 'Description (ru)'))
            ->add('artisticdescriptionEn', 'textarea', array('label' => 'Artistic Description (en)'))
            ->add('artisticdescriptionRu', 'textarea', array('label' => 'Artistic Description (ru)'))

            ->add('imageFile', 'file', array('label' => 'Scan'))
            ->add('manaCost', 'text', array('label' => 'Mana Cost'))
            ->add('rarity', 'text', array('label' => 'Rarity'))
            ->add('power', 'text', array('label' => 'Power'))
            ->add('toughness', 'text', array('label' => 'Toughness'))
            ->add('artist', 'text', array('label' => 'Artist'))
            ->add('number', 'text', array('label' => 'Number'))
            ->add('cardSet', 'entity', array(
                'class'    => 'Rice\DeckKeeperBundle\Entity\CardSet',
                'label'    => 'Set',
                'expanded' => false,
                'multiple' => false,
            ))
        ;

    }

    public function getName()
    {
        return 'card';
    }
}
