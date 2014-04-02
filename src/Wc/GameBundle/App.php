<?php
namespace Wc\GameBundle;

use Wc\AppController;

abstract class App extends AppController
{
    protected $reponame = 'Game';

    public function getGameRepo()
    {
        return $this->getRepo('Game');
    }

    public function getStageRepo()
    {
        return $this->getRepo('Stage');
    }

    public function getTeamRepo()
    {
        return $this->getRepo('Team');
    }

}