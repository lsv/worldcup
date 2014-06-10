<?php
namespace Wc\GameBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Wc\GameBundle\DataFixtures\Fixture;
use Wc\GameBundle\Entity\Game;
use Wc\GameBundle\Entity;

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
            if ($i == 63) continue;

            /** @var Game $match */
            $match = $this->getReference('game-' . $i);
            $homeres = $this->getFaker()->numberBetween(0,2);
            $awayres = $this->getFaker()->numberBetween(0,2);

            if ($match instanceof Entity\Knockout) {
                /** @var Entity\Knockout $match */
                if ($homeres == $awayres) {
                    $bool = $this->getFaker()->boolean();
                    if ($bool) {
                        $match->setHomePenaltyResult(5);
                        $match->setAwayPenaltyResult(4);
                    } else {
                        $match->setHomePenaltyResult(4);
                        $match->setAwayPenaltyResult(5);
                    }
                }
            }

            $match->setHomeresult($homeres);
            $match->setAwayresult($awayres);
            $manager->persist($match);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 120;
    }

} 