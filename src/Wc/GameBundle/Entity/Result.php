<?php
/**
 * Created by PhpStorm.
 * User: lsv
 * Date: 4/3/14
 * Time: 10:36 PM
 */

namespace Wc\GameBundle\Entity;


abstract class Result
{

    const WIN_CLASS = 'success';
    const LOSE_CLASS = 'danger';
    const DRAW_CLASS = 'warning';

    abstract public function getHomeresult();
    abstract public function getAwayresult();

    public function getHomeStateClass()
    {
        if ($this->getHomeresult() === null) {
            return '';
        }

        if ($this->getAwayresult() > $this->getHomeresult()) {
            return self::LOSE_CLASS;
        }

        if ($this->getAwayresult() < $this->getHomeresult()) {
            return self::WIN_CLASS;
        }

        return self::DRAW_CLASS;
    }

    public function getAwayStateClass()
    {
        if ($this->getAwayresult() === null) {
            return '';
        }

        if ($this->getAwayresult() > $this->getHomeresult()) {
            return self::WIN_CLASS;
        }

        if ($this->getAwayresult() < $this->getHomeresult()) {
            return self::LOSE_CLASS;
        }

        return self::DRAW_CLASS;
    }

} 