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
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="SecurityClient")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $client;

//    /**
//     * @ORM\ManyToOne(targetEntity="User")
//     */
    protected $user;


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
    public function xsetClient($client)
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
    public function xsetUser($user)
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

