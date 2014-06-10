<?php
namespace Wc\GameBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Wc\GameBundle\DataFixtures\Fixture;
use Wc\GameBundle\Entity\Team;

class Teams extends Fixture
{

    public function load(ObjectManager $manager)
    {
        foreach($this->teams as $name => $data) {
            $t = new Team();
            $t
                ->setName($name)
                ->setIso2name($data['iso2'])
            ;
            $manager->persist($t);
            $this->addReference('team-' . $name, $t);
        }

        $manager->flush();

    }

    public function getOrder()
    {
        return 10;
    }

} 