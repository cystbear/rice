<?php

namespace Rice\DeckKeeperBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Rice\DeckKeeperBundle\Entity\CardSet;

class LoadCardSetData implements FixtureInterface, OrderedFixtureInterface
{
    public function getOrder()
    {
        return 10;
    }

    public function load(ObjectManager $manager)
    {
        $cardSet = new CardSet();
        $cardSet->setName('Шрамы Мирродина');
        $cardSet->setYear(2010);
        $manager->persist($cardSet);

        $manager->flush();
    }
}
