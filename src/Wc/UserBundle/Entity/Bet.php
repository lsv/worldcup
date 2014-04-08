<?php

namespace Wc\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Wc\GameBundle\Entity as GameEntity;

/**
 * Bet
 *
 * @ORM\Table(name="bet")
 * @ORM\Entity(repositoryClass="Wc\UserBundle\Entity\Repository\Bet")
 */
class Bet
{
    const HOMEBET = 'home';
    const AWAYBET = 'away';
    const DRAWBET = 'draw';

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="bets")
     */
    private $user;

    /**
     * @var GameEntity\Game
     *
     * @ORM\ManyToOne(targetEntity="Wc\GameBundle\Entity\Game", inversedBy="bets")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id", nullable=true)
     */
    private $game = null;

    /**
     * @var GameEntity\Knockout
     *
     * @ORM\ManyToOne(targetEntity="Wc\GameBundle\Entity\Knockout", inversedBy="bets")
     * @ORM\JoinColumn(name="knockout_id", referencedColumnName="id", nullable=true)
     */
    private $knockout = null;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $bet;

    /**
     * @var null|boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $correct = null;

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
     * Set bet
     *
     * @param string $bet
     * @return Bet
     */
    public function setBet($bet)
    {
        $this->bet = $bet;

        return $this;
    }

    /**
     * Get bet
     *
     * @return string 
     */
    public function getBet()
    {
        return $this->bet;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set game
     *
     * @param \Wc\GameBundle\Entity\Game $game
     * @return Bet
     */
    public function setGame(GameEntity\Game $game)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return \Wc\GameBundle\Entity\Game 
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set knockout
     *
     * @param \Wc\GameBundle\Entity\Knockout $knockout
     * @return Bet
     */
    public function setKnockout(GameEntity\Knockout $knockout)
    {
        $this->knockout = $knockout;

        return $this;
    }

    /**
     * Get knockout
     *
     * @return \Wc\GameBundle\Entity\Knockout
     */
    public function getKnockout()
    {
        return $this->knockout;
    }

    /**
     * @param boolean $correct
     * @return $this
     */
    public function setCorrect($correct)
    {
        $this->correct = (bool)$correct;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCorrect()
    {
        return $this->correct;
    }
}
