<?php

namespace Wc\GameBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Stage
 *
 * @ORM\Table(name="stage")
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
    private $name;

    /**
     * @var Game[]
     *
     * @ORM\OneToMany(targetEntity="Game", mappedBy="stage")
     */
    private $games;

    public function __construct()
    {
        $this->games = new ArrayCollection();
    }
}
