<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="connection_token")
 */
class ConnectionToken
{

    /** 
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(name="user_ref", referencedColumnName="id", onDelete="CASCADE")
     * @var User
     */
    private $user;
    /**
     * @ORM\Column(name="token", type="string", length=250,nullable=false)
     * @var string
     */
    private $token;
    /**
     * @ORM\Column(name="last_time_active", nullable=false, type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     * @var \DateTime
     */
    private $lastTimeActive;
    /**
     * @ORM\Column(name="date_inserted", nullable=false, type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     * @var \DateTime
     */
    private $dateInserted;
    /**
     * @ORM\Column(name="remove", type="boolean", nullable=false,options={"default":false})
     * @var boolean
     */
    private $isExpired;

    public function __construct($user = "", $token = "", $lastTimeActive = '', $dateInserted = "")
    {
        $this->setUser($user);
        $this->setToken($token);
        $this->setLastTimeActive($lastTimeActive);
        $this->setDateInserted($dateInserted);
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }
    /**
     * @return \DateTime
     */
    public function getLastTimeActive()
    {
        return $this->lastTimeActive;
    }
    /**
     * @param \DateTime $lastTimeActive
     */
    public function setLastTimeActive($lastTimeActive)
    {
        $this->lastTimeActive = $lastTimeActive;
    }
    /**
     * @return \DateTime
     */
    public function getDateInserted()
    {
        return $this->dateInserted;
    }
    /**
     * @param \DateTime $dateInserted
     */
    public function setDateInserted($dateInserted)
    {
        $this->dateInserted = $dateInserted;
    }
    /**
     * @return boolean
     */
    public function isExpired()
    {
        return $this->isExpired;
    }
    /**
     * @param boolean $isExpired
     */
    public function setIsExpired($isExpired)
    {
        $this->isExpired = $isExpired;
    }

    public function jsonSerialize()
    {
        return [
            'token' => $this->getToken(),
            'user' => $this->getUser(),
            'dateInserted' => $this->getDateInserted(),
            'lastTimeActive' => $this->getLastTimeActive()
        ];
    }
}
