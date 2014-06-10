<?php
/**
 * Created by PhpStorm.
 * User: lsv
 * Date: 4/3/14
 * Time: 10:36 PM
 */

namespace Wc\GameBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Wc\UserBundle\Entity\Repository\Bet;

abstract class Result
{

    const WIN_CLASS = 'success';
    const LOSE_CLASS = 'danger';
    const DRAW_CLASS = 'warning';

    protected $drawIsAllowed = true;
    protected $bets;

    public function __construct()
    {
        $this->bets = new ArrayCollection();
    }

    abstract public function getHomeresult();
    abstract public function getAwayresult();

    public function getAwayPenaltyResult() {}
    public function getHomePenaltyResult() {}

    public function getMatchdate() {
        return new \DateTime();
    }

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

        if ($this->drawIsAllowed) {
            return self::DRAW_CLASS;
        }

        if ($this->getHomePenaltyResult() > $this->getAwayPenaltyResult()) {
            return self::WIN_CLASS;
        }

        return self::LOSE_CLASS;

    }

    public function getAwayStateClass()
    {
        if ($this->getAwayresult() === null) {
            return '';
        }

        if ($this->getAwayresult() < $this->getHomeresult()) {
            return self::LOSE_CLASS;
        }

        if ($this->getAwayresult() > $this->getHomeresult()) {
            return self::WIN_CLASS;
        }

        if ($this->drawIsAllowed) {
            return self::DRAW_CLASS;
        }

        if ($this->getHomePenaltyResult() < $this->getAwayPenaltyResult()) {
            return self::WIN_CLASS;
        }

        return self::LOSE_CLASS;
    }

    public function getIsStarted()
    {
        $now = new \DateTime();
        if ($now->getTimestamp() > $this->getMatchdate()->getTimestamp()) {
            return true;
        }

        return false;
    }

    public function getIsFinish()
    {
        if ($this->getAwayresult() === null && $this->getHomeresult() === null) {
            return false;
        }

        return true;
    }

    /**
     * Add bet
     *
     * @param Result $bet
     * @return $this
     */
    public function addBet(Result $bet)
    {
        $this->bets[] = $bet;

        return $this;
    }

    /**
     * Remove bet
     *
     * @param Result $bet
     */
    public function removeBet(Result $bet)
    {
        $this->bets->removeElement($bet);
    }

    /**
     * Get bets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBets()
    {
        return $this->bets;
    }

    public function getWinnerByBet($team)
    {
        if ($team == 'home') {
            $hometeam = self::WIN_CLASS;
        } elseif ($team == 'draw') {
            $hometeam = self::DRAW_CLASS;
        } else {
            $hometeam = self::LOSE_CLASS;
        }

        return $this->getHomeStateClass() == $hometeam;

    }

} 