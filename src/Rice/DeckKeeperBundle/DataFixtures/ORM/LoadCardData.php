<?php

namespace Rice\DeckKeeperBundle\DataFixtures\ORM;

use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Rice\DeckKeeperBundle\Entity\Card;
use Rice\DeckKeeperBundle\Proxy\CardProxy;

class LoadCardData implements FixtureInterface, OrderedFixtureInterface
{
    public function getOrder()
    {
        return 20;
    }

    public function load(ObjectManager $manager)
    {
        $cardSet = $manager
            ->getRepository('RiceDeckKeeperBundle:CardSet')
            ->findOneBy(array('slug'=>'shramy-mirrodina'))
        ;

        $card1 = new Card();
        $cardProxy1 = new CardProxy($card1);
        $cardProxy1->getCard()->setCardSet($cardSet);
        $cardProxy1->getCard()->setManaCost('1W');
        $cardProxy1->getCard()->setRarity('Uncommon');
        $cardProxy1->getCard()->setPower(1);
        $cardProxy1->getCard()->setToughness(1);
        $cardProxy1->getCard()->setArtist('Igor Kieryluk');
        $cardProxy1->getCard()->setNumber(1);

        $cardProxy1->setNameEn('Abuna Acolyte');
        $cardProxy1->setNameRu('Помощник Абуны');
        $cardProxy1->setTypeEn('Creature');
        $cardProxy1->setTypeRu('Существо');
        $cardProxy1->setSubTypeEn('Cat Cleric');
        $cardProxy1->setSubTypeRu('Кошка Священник');
        $cardProxy1->setDescriptionEn('{T}: Prevent the next 1 damage that would be dealt to target creature or player this turn.
        {T}: Prevent the next 2 damage that would be dealt to target artifact creature this turn.');
        $cardProxy1->setDescriptionRu('{T}: предотвратите следующее 1 повреждение, которое должно быть нанесено целевому существу или игроку в этом ходу.
        {T}: предотвратите следующие 2 повреждения, которые должны быть нанесены целевому артефактному существу в этом ходу.');
        $cardProxy1->setArtisticdescriptionEn('"You can break nothing I cannot mend."');
        $cardProxy1->setArtisticdescriptionRu('«Вы не можете сломать что-нибудь такое, что я не мог бы починить».');

        $manager->persist($card1);


        $card2 = new Card();
        $cardProxy2 = new CardProxy($card2);
        $cardProxy2->getCard()->setCardSet($cardSet);
        $cardProxy2->getCard()->setManaCost('2W');
        $cardProxy2->getCard()->setRarity('Common');
        $cardProxy2->getCard()->setArtist('Daarken');
        $cardProxy2->getCard()->setNumber(2);

        $cardProxy2->setNameEn('Arrest');
        $cardProxy2->setNameRu('Арест');
        $cardProxy2->setTypeEn('Enchantment');
        $cardProxy2->setTypeRu('Чары');
        $cardProxy2->setSubTypeEn('Aura');
        $cardProxy2->setSubTypeRu('Аура');
        $cardProxy2->setDescriptionEn('Enchant creature
        Enchanted creature can\'t attack or block, and its activated abilities can\'t be activated.');
        $cardProxy2->setDescriptionRu('Зачаровать существо
        Зачарованное существо не может атаковать или блокировать, и его активируемые способности нельзя активировать.');
        $cardProxy2->setArtisticdescriptionEn('Bladehold houses a rogues\' gallery filled with the living "statues" of the worst enemies of the Auriok.');
        $cardProxy2->setArtisticdescriptionRu('В Блэйдхолде есть архив, в котором хранятся живые статуи самых страшных врагов ауриоков.');

        $manager->persist($card2);


        $card3 = new Card();
        $cardProxy3 = new CardProxy($card3);
        $cardProxy3->getCard()->setCardSet($cardSet);
        $cardProxy3->getCard()->setManaCost('WW');
        $cardProxy3->getCard()->setRarity('Uncommon');
        $cardProxy3->getCard()->setPower(2);
        $cardProxy3->getCard()->setToughness(2);
        $cardProxy3->getCard()->setArtist('Mike Bierek');
        $cardProxy3->getCard()->setNumber(3);

        $cardProxy3->setNameEn('Auriok Edgewright');
        $cardProxy3->setNameRu('Ауриок-Ножедел');
        $cardProxy3->setTypeEn('Creature');
        $cardProxy3->setTypeRu('Существо');
        $cardProxy3->setSubTypeEn('Human Soldier');
        $cardProxy3->setSubTypeRu('Человек Солдат');
        $cardProxy3->setDescriptionEn('Metalcraft — Auriok Edgewright has double strike as long as you control three or more artifacts.');
        $cardProxy3->setDescriptionRu('Работа по металлу — Ауриок-Ножедел имеет Двойной удар, пока вы контролируете не менее трех артефактов.');
        $cardProxy3->setArtisticdescriptionEn('Auriok soldiers craft their own weapons, forging a connection to the steel with each blow of the hammer.');
        $cardProxy3->setArtisticdescriptionRu('Ауриокские солдаты сами куют оружие, каждым ударом молота укрепляя свою связь со сталью.');


        $manager->persist($card3);

        copy(__DIR__.'/ImagesVault/1.jpg', __DIR__.'/Images/1.jpg');
        copy(__DIR__.'/ImagesVault/2.jpg', __DIR__.'/Images/2.jpg');
        copy(__DIR__.'/ImagesVault/3.jpg', __DIR__.'/Images/3.jpg');

        $image1 = new File(__DIR__.'/Images/1.jpg');
        $cardProxy1->imageFile = $image1;
        $cardProxy1->evaluateUpload();

        $image2 = new File(__DIR__.'/Images/2.jpg');
        $cardProxy2->imageFile = $image2;
        $cardProxy2->evaluateUpload();

        $image3 = new File(__DIR__.'/Images/3.jpg');
        $cardProxy3->imageFile = $image3;
        $cardProxy3->evaluateUpload();

        $manager->flush();
    }
}
