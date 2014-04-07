<?php
namespace Wc\UserBundle;

use Wc\AppController;

abstract class App extends AppController
{
    protected $reponame = 'User';

    /**
     * @return \Wc\UserBundle\Entity\Repository\User
     * @throws \LogicException
     * @throws \InvalidArgumentException
     */
    public function getUserRepo()
    {
        return $this->getRepo('User');
    }

    /**
     * @return \Wc\UserBundle\Entity\Repository\Bet
     * @throws \LogicException
     * @throws \InvalidArgumentException
     */
    public function getBetRepo()
    {
        return $this->getRepo('Bet');
    }

}