<?php

namespace Wc\GameBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity
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
     * @var Game[]
     *
     * @ORM\OneToMany(targetEntity="Game", mappedBy="hometeam")
     */
    private $hometeams;

    /**
     * @var Game[]
     *
     * @ORM\OneToMany(targetEntity="Game", mappedBy="awayteam")
     */
    private $awayteams;

    public function __construct()
    {
        $this->hometeams = new ArrayCollection();
        $this->awayteams = new ArrayCollection();
    }

}
