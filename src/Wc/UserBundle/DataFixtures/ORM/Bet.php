<?php
namespace Wc\UserBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Wc\GameBundle\DataFixtures\Fixture;
use Wc\UserBundle\Entity;

class Bet extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $games = $manager->getRepository('WcGameBundle:Game')->findAll();
        foreach($games as $g) {
            /** @var \Wc\GameBundle\Entity\Game $g */
            for($i = 0; $i < $this->getNumberofUsers(); $i++) {
                if ($this->getFaker()->boolean()) {
                    $bet = new Entity\Bet;
                    $bet
                        ->setGame($g)
                        ->setPoints($this->getFaker()->numberBetween(1, 250))
                        ->setBet($this->getFaker()->randomElement(array('home', 'draw', 'away')))
                        ->setUser($this->getReference('user-' . $i));
                    $manager->persist($bet);
                }
            }
        }
        
        $manager->flush();
        
    }

    public function getOrder()
    {
        return 110;
    }

} 