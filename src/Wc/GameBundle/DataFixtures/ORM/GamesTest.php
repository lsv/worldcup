<?php
namespace Wc\GameBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Wc\GameBundle\DataFixtures\Fixture;
use Wc\GameBundle\Entity\Game;

class GamesTest extends Fixture
{

    public function load(ObjectManager $manager)
    {
        /*
        $matches = array(
            $this->getReference('game-1'),
            $this->getReference('game-2'),
            $this->getReference('game-17'),
            $this->getReference('game-18'),
            $this->getReference('game-33'),
            $this->getReference('game-34'),
        );
        */

        for($i = 1; $i <= 48; $i++) {
            /** @var Game $match */
            $match = $this->getReference('game-' . $i);
            $match->setHomeresult($this->getFaker()->randomNumber(0,2));
            $match->setAwayresult($this->getFaker()->randomNumber(0,2));
            $manager->persist($match);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 14;
    }

} 