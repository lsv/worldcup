<?php

/*
 * This file is part of the HWIOAuthBundle package.
 *
 * (c) Hardware.Info <opensource@hardware.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Wc\UserBundle\Entity\Traits;

/**
 * GithubTrait
 *
 * @author Martin Aarhof <martin.aarhof@gmail.com>
 */
trait GithubTrait
{

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $github_id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $github_access_token;

    /**
     * @param string $id
     * @return $this
     */
    public function setGithubId($id)
    {
        $this->github_id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getGithubId()
    {
        return $this->github_id;
    }

    /**
     * @param string $token
     * @return $this
     */
    public function setGithubAccessToken($token)
    {
        $this->github_access_token = $token;
        return $this;
    }

    /**
     * @return string
     */
    public function getGithubAccessToken()
    {
        return $this->github_access_token;
    }

} 