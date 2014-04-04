<?php

namespace Wc\GameBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="Wc\GameBundle\Entity\Repository\Team")
 */
class Team
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
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $iso2name;

    /**
     * @var ArrayCollection>Game[]
     *
     * @ORM\OneToMany(targetEntity="Game", mappedBy="hometeam")
     */
    private $hometeams;

    /**
     * @var ArrayCollection>Game[]
     *
     * @ORM\OneToMany(targetEntity="Game", mappedBy="awayteam")
     */
    private $awayteams;

    public function __construct()
    {
        $this->hometeams = new ArrayCollection();
        $this->awayteams = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Team
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
     * Set iso2name
     *
     * @param string $iso2name
     * @return Team
     */
    public function setIso2name($iso2name)
    {
        $this->iso2name = $iso2name;

        return $this;
    }

    /**
     * Get iso2name
     *
     * @return string 
     */
    public function getIso2name()
    {
        return $this->iso2name;
    }

    /**
     * Add hometeams
     *
     * @param \Wc\GameBundle\Entity\Game $hometeams
     * @return Team
     */
    public function addHometeam(Game $hometeams)
    {
        $this->hometeams[] = $hometeams;

        return $this;
    }

    /**
     * Remove hometeams
     *
     * @param \Wc\GameBundle\Entity\Game $hometeams
     */
    public function removeHometeam(Game $hometeams)
    {
        $this->hometeams->removeElement($hometeams);
    }

    /**
     * Get hometeams
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHometeams()
    {
        return $this->hometeams;
    }

    /**
     * Add awayteams
     *
     * @param \Wc\GameBundle\Entity\Game $awayteams
     * @return Team
     */
    public function addAwayteam(Game $awayteams)
    {
        $this->awayteams[] = $awayteams;

        return $this;
    }

    /**
     * Remove awayteams
     *
     * @param \Wc\GameBundle\Entity\Game $awayteams
     */
    public function removeAwayteam(Game $awayteams)
    {
        $this->awayteams->removeElement($awayteams);
    }

    /**
     * Get awayteams
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAwayteams()
    {
        return $this->awayteams;
    }

}
