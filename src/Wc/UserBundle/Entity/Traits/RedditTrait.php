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
 * RedditTrait
 *
 * @author Martin Aarhof <martin.aarhof@gmail.com>
 */
trait RedditTrait
{

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $reddit_id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $reddit_access_token;

    /**
     * @param string $id
     * @return $this
     */
    public function setRedditId($id)
    {
        $this->reddit_id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getReditId()
    {
        return $this->reddit_id;
    }

    /**
     * @param string $token
     * @return $this
     */
    public function setRedditAccessToken($token)
    {
        $this->reddit_access_token = $token;
        return $this;
    }

    /**
     * @return string
     */
    public function getRedditAccessToken()
    {
        return $this->reddit_access_token;
    }

} 