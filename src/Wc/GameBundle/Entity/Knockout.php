<?php
namespace Wc\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Knockout
 *
 * @ORM\Table(name="knockout")
 * @ORM\Entity(repositoryClass="Wc\GameBundle\Entity\Repository\Knockout")
 */
class Knockout extends Result
{
    const WIN_CLASS = 'success';
    const LOSE_CLASS = 'danger';
    const DRAW_CLASS = 'warning';

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
     * @var \DateTime
     *
     * @ORM\Column(type="datetimetz")
     */
    private $matchdate;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $hometeam;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $awayteam;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $fromgroup = false;

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
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $homePenaltyResult = null;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $awayPenaltyResult = null;

    /**
     * @var Stage
     *
     * @ORM\ManyToOne(targetEntity="Stage", inversedBy="knockouts")
     */
    private $stage;


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
     * Set matchid
     *
     * @param integer $matchid
     * @return Knockout
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

    /**
     * Set matchdate
     *
     * @param \DateTime $matchdate
     * @return Knockout
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
     * Set hometeam
     *
     * @param string $hometeam
     * @return Knockout
     */
    public function setHometeam($hometeam)
    {
        $this->hometeam = $hometeam;

        return $this;
    }

    /**
     * Get hometeam
     *
     * @return string 
     */
    public function getHometeam()
    {
        return $this->hometeam;
    }

    /**
     * Set awayteam
     *
     * @param string $awayteam
     * @return Knockout
     */
    public function setAwayteam($awayteam)
    {
        $this->awayteam = $awayteam;

        return $this;
    }

    /**
     * Get awayteam
     *
     * @return string 
     */
    public function getAwayteam()
    {
        return $this->awayteam;
    }

    /**
     * Set group
     *
     * @param boolean $group
     * @return Knockout
     */
    public function setFromgroup( $group)
    {
        $this->fromgroup = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \bool 
     */
    public function getFromgroup()
    {
        return $this->fromgroup;
    }

    /**
     * Set homeresult
     *
     * @param integer $homeresult
     * @return Knockout
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
     * @return Knockout
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
     * Set setAwayPenaltyResult
     *
     * @param integer $result
     * @return Knockout
     */
    public function setAwayPenaltyResult($result)
    {
        $this->awayPenaltyResult = $result;

        return $this;
    }

    /**
     * Get getAwayPenaltyResult
     *
     * @return integer
     */
    public function getAwayPenaltyResult()
    {
        return $this->awayPenaltyResult;
    }

    /**
     * Set setHomePenaltyResult
     *
     * @param integer $result
     * @return Knockout
     */
    public function setHomePenaltyResult($result)
    {
        $this->homePenaltyResult = $result;

        return $this;
    }

    /**
     * Get getHomePenaltyResult
     *
     * @return integer
     */
    public function getHomePenaltyResult()
    {
        return $this->homePenaltyResult;
    }

    /**
     * Set stage
     *
     * @param \Wc\GameBundle\Entity\Stage $stage
     * @return Knockout
     */
    public function setStage(Stage $stage = null)
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
     * @return null|string
     */
    public function getWinner()
    {
        if ($this->getHomeresult() === null || $this->getAwayresult() === null) {
            return null;
        }

        if ($this->getHomeresult() > $this->getAwayresult()) {
            return $this->getHometeam();
        } elseif($this->getHomeresult() < $this->getAwayresult()) {
            return $this->getAwayteam();
        } elseif ($this->getHomePenaltyResult() > $this->getAwayPenaltyResult()) {
            return $this->getHometeam();
        } else {
            return $this->getAwayteam();
        }
    }

    public function getLoser()
    {
        if ($this->getHomeresult() === null || $this->getAwayresult() === null) {
            return null;
        }

        if ($this->getHomeresult() > $this->getAwayresult()) {
            return $this->getAwayteam();
        } elseif($this->getHomeresult() < $this->getAwayresult()) {
            return $this->getHometeam();
        } elseif ($this->getHomePenaltyResult() > $this->getAwayPenaltyResult()) {
            return $this->getAwayteam();
        } else {
            return $this->getHometeam();
        }
    }

}
