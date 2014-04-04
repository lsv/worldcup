<?php
/**
 * Created by PhpStorm.
 * User: lsv
 * Date: 4/3/14
 * Time: 6:59 AM
 */

namespace Wc\GameBundle\Data;


class TeamData
{

    const WIN = 3;
    const DRAW = 1;
    const LOSE = 0;

    private $teamId;

    /**
     * @var int
     */
    private $played = 0;

    /**
     * @var int
     */
    private $wins = 0;

    /**
     * @var int
     */
    private $draws = 0;

    /**
     * @var int
     */
    private $losses = 0;

    /**
     * @var int
     */
    private $goalsfor = 0;

    /**
     * @var int
     */
    private $goalsagainst = 0;

    /**
     * @var int
     */
    private $points = 0;

    public function __construct($team)
    {
        $this->teamId = $team;
    }

    /**
     * @param int $played
     * @return $this
     */
    public function setPlayed($played)
    {
        $this->played = $played;
        return $this;
    }

    /**
     * @param int $wins
     * @return $this
     */
    public function setWins($wins)
    {
        $this->wins = $wins;
        return $this;
    }

    /**
     * @param int $draws
     * @return $this
     */
    public function setDraws($draws)
    {
        $this->draws = $draws;
        return $this;
    }

    /**
     * @param int $losses
     * @return $this
     */
    public function setLosses($losses)
    {
        $this->losses = $losses;
        return $this;
    }

    /**
     * @param int $goals
     * @return $this
     */
    public function setGoalsFor($goals)
    {
        $this->goalsfor = $goals;
        return $this;
    }

    /**
     * @param int $goals
     * @return $this
     */
    public function setGoalsAgainst($goals)
    {
        $this->goalsagainst = $goals;
        return $this;
    }

    /**
     * @param int $points
     * @return $this
     */
    public function setPoints($points)
    {
        $this->points = $points;
        return $this;
    }

    /**
     * @return int
     */
    public function getPlayed()
    {
        return $this->played;
    }

    /**
     * @return int
     */
    public function getWins()
    {
        return $this->wins;
    }

    /**
     * @return int
     */
    public function getDraws()
    {
        return $this->draws;
    }

    /**
     * @return int
     */
    public function getLosses()
    {
        return $this->losses;
    }

    /**
     * @return int
     */
    public function getGoalsFor()
    {
        return $this->goalsfor;
    }

    /**
     * @return int
     */
    public function getGoalsAgainst()
    {
        return $this->goalsagainst;
    }

    public function getGoalsDiff()
    {
        return $this->goalsfor - $this->goalsagainst;
    }

    /**
     * @return int
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @return $this
     */
    public function addPlayed()
    {
        return $this->setPlayed($this->getPlayed() + 1);
    }

    public function addForGoals($goals)
    {
        return $this->setGoalsFor($this->getGoalsFor() + $goals);
    }

    public function addAgainstGoals($goals)
    {
        return $this->setGoalsAgainst($this->getGoalsAgainst() + $goals);
    }

    public function addLoss()
    {
        $this->setLosses($this->getLosses() + 1);
        $this->setPoints($this->getPoints() + self::LOSE);
        return $this;
    }

    public function addDraw()
    {
        $this->setDraws($this->getDraws() + 1);
        $this->setPoints($this->getPoints() + self::DRAW);
        return $this;
    }

    public function addWin()
    {
        $this->setWins($this->getWins() + 1);
        $this->setPoints($this->getPoints() + self::WIN);
        return $this;
    }

} 