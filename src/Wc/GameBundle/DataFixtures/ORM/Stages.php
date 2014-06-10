<?php
namespace Wc\GameBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Wc\GameBundle\DataFixtures\Fixture;
use Wc\GameBundle\Entity\Stage;

class Stages extends Fixture
{

    public function load(ObjectManager $manager)
    {
        foreach($this->stages as $key => $data) {
            $t = new Stage();
            $t
                ->setName($data['name'])
                ->setStage($key)
                ->setIsGroup($data['isgroup'])
            ;
            $manager->persist($t);
            $this->addReference('stage-' . $key, $t);
        }

        $manager->flush();

    }

    public function getOrder()
    {
        return 20;
    }

} 