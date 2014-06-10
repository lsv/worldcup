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
 * FacebookTrait
 *
 * @author Martin Aarhof <martin.aarhof@gmail.com>
 */
trait FacebookTrait
{

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $facebook_id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $facebook_access_token;

    /**
     * @param string $id
     * @return $this
     */
    public function setFacebookId($id)
    {
        $this->facebook_id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebook_id;
    }

    /**
     * @param string $token
     * @return $this
     */
    public function setFacebookAccessToken($token)
    {
        $this->facebook_access_token = $token;
        return $this;
    }

    /**
     * @return string
     */
    public function getFacebookAccessToken()
    {
        return $this->facebook_access_token;
    }

} 