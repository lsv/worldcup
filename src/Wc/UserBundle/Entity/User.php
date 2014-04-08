<?php

namespace Wc\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use HWI\Bundle\OAuthBundle\Entity\Traits\FacebookTrait;
use HWI\Bundle\OAuthBundle\Entity\Traits\RedditTrait;
use HWI\Bundle\OAuthBundle\Entity\Traits\GithubTrait;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="Wc\UserBundle\Entity\Repository\User")
 */
class User extends BaseUser
{
    use FacebookTrait;
    use GithubTrait;
    use RedditTrait;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var ArrayCollection[]>Bet
     * @ORM\ManyToMany(targetEntity="Bet", mappedBy="users")
     */
    protected $bets;

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
}
