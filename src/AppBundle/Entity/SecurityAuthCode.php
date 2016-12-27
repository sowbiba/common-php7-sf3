<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\OAuthServerBundle\Entity\AuthCode as BaseAuthCode;

/**
 * SecurityAuthCode
 *
 * @ORM\Table(name="security_auth_code")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SecurityAuthCodeRepository")
 */
class SecurityAuthCode extends BaseAuthCode
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
     * @return SecurityAuthCode
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
     * @return SecurityAuthCode
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

