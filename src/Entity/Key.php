<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="api_keys")
 */
class Key
{

    /** 
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(name="userRef", referencedColumnName="id", onDelete="CASCADE")
     * @var User
     */
    private $user;
    /**
     * @ORM\Column(name="APIKey", type="string", length=32, nullable=false)
     * @var string
     */
    private $apiKey;
    /**
     * @ORM\Column(name="APICall", type="integer", nullable=false)
     * @var integer
     */
    private $apiCall;

    public function __construct($user = "", $apiCall = "", $apiKey = "")
    {
        $this->setUser($user);
        $this->setApiKey($apiKey);
        $this->setApiCall($apiCall);
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
     * @return integer
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @param int $id
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }
    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }
    /**
     * @return integer
     */
    public function getApiCall()
    {
        return $this->apiCall;
    }
    /**
     * @param integer $apiCall
     */
    public function setApiCall($apiCall)
    {
        $this->apiCall = $apiCall;
    }

    public function jsonSerialize()
    {
        return [
            'user' => $this->getUser(),
            'apiKey' => $this->getApiKey(),
            'apiCall' => $this->getApiCall()
        ];
    }

    public static function jsonDeserialize($jsonDecoded)
    {
        $classInstance = new self();
        foreach ($jsonDecoded as $attributeName => $attributeValue) {
            $classInstance->{$attributeName} = $attributeValue;
        }
        return $classInstance;
    }
}
