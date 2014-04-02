<?php

namespace Wc\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass="Wc\GameBundle\Entity\Repository\Game")
 */
class Game
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $matchid;

    /**
     * @var Stage
     *
     * @ORM\ManyToOne(targetEntity="Stage", inversedBy="games")
     */
    private $stage;

    /**
     * @var Team
     *
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="hometeams")
     */
    private $hometeam;

    /**
     * @var Team
     *
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="awayteams")
     */
    private $awayteam;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $matchdate;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $homeresult = null;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $awayresult = null;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set matchdate
     *
     * @param \DateTime $matchdate
     * @return Game
     */
    public function setMatchdate($matchdate)
    {
        $this->matchdate = $matchdate;

        return $this;
    }

    /**
     * Get matchdate
     *
     * @return \DateTime 
     */
    public function getMatchdate()
    {
        return $this->matchdate;
    }

    /**
     * Set homeresult
     *
     * @param integer $homeresult
     * @return Game
     */
    public function setHomeresult($homeresult)
    {
        $this->homeresult = $homeresult;

        return $this;
    }

    /**
     * Get homeresult
     *
     * @return integer 
     */
    public function getHomeresult()
    {
        return $this->homeresult;
    }

    /**
     * Set awayresult
     *
     * @param integer $awayresult
     * @return Game
     */
    public function setAwayresult($awayresult)
    {
        $this->awayresult = $awayresult;

        return $this;
    }

    /**
     * Get awayresult
     *
     * @return integer 
     */
    public function getAwayresult()
    {
        return $this->awayresult;
    }

    /**
     * Set stage
     *
     * @param \Wc\GameBundle\Entity\Stage $stage
     * @return Game
     */
    public function setStage(\Wc\GameBundle\Entity\Stage $stage = null)
    {
        $this->stage = $stage;

        return $this;
    }

    /**
     * Get stage
     *
     * @return \Wc\GameBundle\Entity\Stage 
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * Set hometeam
     *
     * @param \Wc\GameBundle\Entity\Team $hometeam
     * @return Game
     */
    public function setHometeam(\Wc\GameBundle\Entity\Team $hometeam = null)
    {
        $this->hometeam = $hometeam;

        return $this;
    }

    /**
     * Get hometeam
     *
     * @return \Wc\GameBundle\Entity\Team 
     */
    public function getHometeam()
    {
        return $this->hometeam;
    }

    /**
     * Set awayteam
     *
     * @param \Wc\GameBundle\Entity\Team $awayteam
     * @return Game
     */
    public function setAwayteam(\Wc\GameBundle\Entity\Team $awayteam = null)
    {
        $this->awayteam = $awayteam;

        return $this;
    }

    /**
     * Get awayteam
     *
     * @return \Wc\GameBundle\Entity\Team 
     */
    public function getAwayteam()
    {
        return $this->awayteam;
    }

    /**
     * Set matchid
     *
     * @param integer $matchid
     * @return Game
     */
    public function setMatchid($matchid)
    {
        $this->matchid = $matchid;

        return $this;
    }

    /**
     * Get matchid
     *
     * @return integer 
     */
    public function getMatchid()
    {
        return $this->matchid;
    }
}
