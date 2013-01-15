<?php

namespace Rice\DeckKeeperBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Rice\DeckKeeperBundle\Entity\Card;

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

        $card = new Card();
        $card->setName('Помощник Абуны');
        $card->setCardSet($cardSet);
        $card->setManaCost('1W');
        $card->setType('Существо');
        $card->setSubType('Кошка Священник');
        $card->setDescription('{T}: предотвратите следующее 1 повреждение, которое должно быть нанесено целевому существу или игроку в этом ходу.
        {T}: предотвратите следующие 2 повреждения, которые должны быть нанесены целевому артефактному существу в этом ходу.');
        $card->setRarity('Uncommon');
        $card->setPower(1);
        $card->setToughness(1);
        $card->setArtisticDescription('«Вы не можете сломать что-нибудь такое, что я не мог бы починить».');
        $card->setArtist('Igor Kieryluk');
        $card->setNumber(1);
        $manager->persist($card);

        $card2 = new Card();
        $card2->setName('Арест');
        $card2->setCardSet($cardSet);
        $card2->setManaCost('2W');
        $card2->setType('Чары');
        $card2->setSubType('Аура');
        $card2->setDescription('Зачаровать существо
        Зачарованное существо не может атаковать или блокировать, и его активируемые способности нельзя активировать.');
        $card2->setRarity('Common');
        $card2->setArtisticDescription('В Блэйдхолде есть архив, в котором хранятся живые статуи самых страшных врагов ауриоков.');
        $card2->setArtist('Daarken');
        $card2->setNumber(2);
        $manager->persist($card2);

        $card3 = new Card();
        $card3->setName('Ауриок-Ножедел');
        $card3->setCardSet($cardSet);
        $card3->setManaCost('WW');
        $card3->setType('Существо');
        $card3->setSubType('Человек Солдат');
        $card3->setDescription('Работа по металлу — Ауриок-Ножедел имеет Двойной удар, пока вы контролируете не менее трех артефактов.');
        $card3->setRarity('Uncommon');
        $card3->setPower(2);
        $card3->setToughness(2);
        $card3->setArtisticDescription('Ауриокские солдаты сами куют оружие, каждым ударом молота укрепляя свою связь со сталью.');
        $card3->setArtist('Mike Bierek');
        $card3->setNumber(3);
        $manager->persist($card3);

        $manager->flush();
    }
}
