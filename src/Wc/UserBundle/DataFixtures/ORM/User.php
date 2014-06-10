<?php
namespace Wc\UserBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Wc\GameBundle\DataFixtures\Fixture;
use Wc\UserBundle\Entity;

class User extends Fixture
{

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < $this->getNumberofUsers(); $i++) {
            $u = new Entity\User;
            $u
                ->setEmail($this->getFaker()->randomDigit . '.' . $this->getFaker()->email)
                ->setEnabled(true)
                ->setPlainPassword($this->getFaker()->text())
                ->setUsername($this->getFaker()->userName . '.' . $this->getFaker()->randomDigit)
            ;
            $this->setRandomIdentity($u);
            
            $this->setReference('user-' . $i, $u);
            $manager->persist($u);
        } 
        $manager->flush();
    }
    
    private function setRandomIdentity(Entity\User &$user)
    {
        $user->{$this->getFaker()->randomElement(array('setFacebookId', 'setGithubId', 'setRedditId'))}($this->getFaker()->randomDigit);
    }

    public function getOrder()
    {
        return 100;
    }

} 