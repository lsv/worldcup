<?php

namespace Wc\GameBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Stage
 *
 * @ORM\Table(name="stage",indexes={@ORM\Index(name="stage_idx", columns={"stage"})})
 * @ORM\Entity(repositoryClass="Wc\GameBundle\Entity\Repository\Stage")
 */
class Stage
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
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $stage;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="isgroup", type="boolean")
     */
    private $isGroup = true;

    /**
     * @var ArrayCollection>Game[]
     *
     * @ORM\OneToMany(targetEntity="Game", mappedBy="stage")
     * @ORM\OrderBy({"matchdate" = "ASC"})
     */
    private $games;

    /**
     * @var ArrayCollection>Knockout[]
     *
     * @ORM\OneToMany(targetEntity="Knockout", mappedBy="stage")
     * @ORM\OrderBy({"matchdate" = "ASC"})
     */
    private $knockouts;

    public function __construct()
    {
        $this->games = new ArrayCollection();
        $this->knockouts = new ArrayCollection();
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
     * Set stage
     *
     * @param string $stage
     * @return Stage
     */
    public function setStage($stage)
    {
        $this->stage = $stage;

        return $this;
    }

    /**
     * Get stage
     *
     * @return string 
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Stage
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add games
     *
     * @param \Wc\GameBundle\Entity\Game $games
     * @return Stage
     */
    public function addGame(Game $games)
    {
        $this->games[] = $games;

        return $this;
    }

    /**
     * Remove games
     *
     * @param \Wc\GameBundle\Entity\Game $games
     */
    public function removeGame(Game $games)
    {
        $this->games->removeElement($games);
    }

    /**
     * Get games
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGames()
    {
        return $this->games;
    }

    /**
     * Set isGroup
     *
     * @param boolean $isGroup
     * @return Stage
     */
    public function setIsGroup($isGroup)
    {
        $this->isGroup = $isGroup;

        return $this;
    }

    /**
     * Get isGroup
     *
     * @return boolean 
     */
    public function getIsGroup()
    {
        return $this->isGroup;
    }

    /**
     * Add knockouts
     *
     * @param \Wc\GameBundle\Entity\Knockout $knockouts
     * @return Stage
     */
    public function addKnockout(Knockout $knockouts)
    {
        $this->knockouts[] = $knockouts;

        return $this;
    }

    /**
     * Remove knockouts
     *
     * @param \Wc\GameBundle\Entity\Knockout $knockouts
     */
    public function removeKnockout(Knockout $knockouts)
    {
        $this->knockouts->removeElement($knockouts);
    }

    /**
     * Get knockouts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getKnockouts()
    {
        return $this->knockouts;
    }
}
