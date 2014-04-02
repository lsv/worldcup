<?php

namespace Wc\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table()
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
     * @ORM\Column(type="integer")
     */
    private $homeresult;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $awayresult;

}
