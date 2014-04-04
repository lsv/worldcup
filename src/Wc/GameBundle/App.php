<?php
namespace Wc\GameBundle;

use Wc\AppController;

abstract class App extends AppController
{
    protected $reponame = 'Game';

    /**
     * @return \Wc\GameBundle\Entity\Repository\Game
     */
    public function getGameRepo()
    {
        return $this->getRepo('Game');
    }

    /**
     * @return \Wc\GameBundle\Entity\Repository\Stage
     */
    public function getStageRepo()
    {
        return $this->getRepo('Stage');
    }

    /**
     * @return \Wc\GameBundle\Entity\Repository\Team
     */
    public function getTeamRepo()
    {
        return $this->getRepo('Team');
    }

    /**
     * @return \Wc\GameBundle\Entity\Repository\Knockout
     */
    public function getKnockoutRepo()
    {
        return $this->getRepo('Knockout');
    }

}