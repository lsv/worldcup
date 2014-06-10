<?php

namespace Wc\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Wc\UserBundle\Entity\Traits;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="Wc\UserBundle\Entity\Repository\User")
 */
class User extends BaseUser
{
    use Traits\FacebookTrait;
    use Traits\GithubTrait;
    use Traits\RedditTrait;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $points = 0;

    /**
     * @var ArrayCollection[]>Bet
     * @ORM\OneToMany(targetEntity="Bet", mappedBy="user")
     */
    private $bets;

    public function __construct()
    {
        $this->bets = new ArrayCollection();
        parent::__construct();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function getType()
    {
        if ($this->getFacebookId()) {
            return 'Facebook';
        }
        
        if ($this->getReditId()) {
            return 'Reddit';
        }
        
        if ($this->getGithubId()) {
            return 'Github';
        }
        
        return 'Unknown';
        
    }

    /**
     * Add bets
     *
     * @param \Wc\UserBundle\Entity\Bet $bets
     * @return User
     */
    public function addBet(\Wc\UserBundle\Entity\Bet $bets)
    {
        $this->bets[] = $bets;

        return $this;
    }

    /**
     * Remove bets
     *
     * @param \Wc\UserBundle\Entity\Bet $bets
     */
    public function removeBet(\Wc\UserBundle\Entity\Bet $bets)
    {
        $this->bets->removeElement($bets);
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

    /**
     * @param integer $points
     * @return $this
     */
    public function setPoints($points)
    {
        $this->points = $points;
        return $this;
    }

    /**
     * @return integer
     */
    public function getPoints()
    {
        return $this->points;
    }
}
