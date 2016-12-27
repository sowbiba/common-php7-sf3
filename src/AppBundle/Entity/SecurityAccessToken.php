<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\OAuthServerBundle\Entity\AccessToken as BaseAccessToken;

/**
 * SecurityAccessToken
 *
 * @ORM\Table(name="security_access_token")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SecurityAccessTokenRepository")
 */
class SecurityAccessToken extends BaseAccessToken
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SecurityClient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $user;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set client
     *
     * @param \stdClass $client
     *
     * @return SecurityAccessToken
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \stdClass
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set user
     *
     * @param \stdClass $user
     *
     * @return SecurityAccessToken
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \stdClass
     */
    public function getUser()
    {
        return $this->user;
    }
}

