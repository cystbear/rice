<?php

namespace Rice\GlueBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Rice\GlueBundle\Entity;

class LoadGluedData implements FixtureInterface, OrderedFixtureInterface
{
    public function getOrder()
    {
        return 1000;
    }

    public function load(ObjectManager $manager)
    {
        $shipping = new Entity\Shipping();
        $shipping->setName('Shipping 1');
        $manager->persist($shipping);

        $product = new Entity\Product();
        $product->setName('Product 1');
        $product->setShipping($shipping);
        $manager->persist($product);

        $manager->flush();

        // ============================================================================================================

        $customer = new Entity\Customer();
        $manager->persist($customer);

        $cart = new Entity\Cart();
        $cart->setCustomer($customer);
        $manager->persist($cart);

        $manager->flush();

        // ============================================================================================================

        $bilbo = new Entity\Student('Bilbo');
        $manager->persist($bilbo);

        $frodo = new Entity\Student('Frodo');
        $frodo->setMentor($bilbo);
        $manager->persist($frodo);

        $manager->flush();

        // ============================================================================================================

        $dream = new Entity\Dream();
        $manager->persist($dream);

        $feature1 = new Entity\Feature();
        $feature1->setDream($dream);
        $manager->persist($feature1);

        $feature2 = new Entity\Feature();
        $feature2->setDream($dream);
        $manager->persist($feature2);

        $feature3 = new Entity\Feature();
        $feature3->setDream($dream);
        $manager->persist($feature3);

        $manager->flush();

        // ============================================================================================================

        $stud1 = new Entity\Contributor();
        $stud2 = new Entity\Contributor();
        $stud3 = new Entity\Contributor();
        $manager->persist($stud1);
        $manager->persist($stud2);
        $manager->persist($stud3);


        $geekHub = new Entity\Project();
        $geekHub->addContributor($stud1);
        $geekHub->addContributor($stud2);
        $geekHub->addContributor($stud3);
        $manager->persist($geekHub);

        $manager->flush();

        // ===========

        $exercise = new Entity\Project();
        $manager->persist($exercise);

        $alex = new Entity\Contributor();
        $alex->addProject($exercise);
        $manager->persist($alex);

        $oleg = new Entity\Contributor();
        $oleg->addProject($exercise);
        $manager->persist($oleg);

        $manager->flush();

        // ============================================================================================================
    }
}
