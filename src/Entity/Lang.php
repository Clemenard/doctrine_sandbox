<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="lang")
 */
class Lang
{

    /** 
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\Column(name="name", type="string", length=250,nullable=false)
     * @var string
     */
    private $name;
    /**
     * @ORM\Column(name="langcode", type="string", length=2,nullable=false)
     * @var string
     */
    private $langcode;
    /**
     * @ORM\Column(name="path", type="string", length=250,nullable=false)
     * @var string
     */
    private $path;
    /**
     * @ORM\Column(name="available", type="boolean", nullable=false,options={"default":false})
     * @var boolean
     */
    private $isAvailable;

    public function __construct($user = "", $name = "", $langcode = '', $path = "")
    {
        $this->setUser($user);
        $this->setName($name);
        $this->setLangcode($langcode);
        $this->setPath($path);
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
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    /**
     * @return string
     */
    public function getLangcode()
    {
        return $this->langcode;
    }
    /**
     * @param string $langcode
     */
    public function setLangcode($langcode)
    {
        $this->langcode = $langcode;
    }
    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }
    /**
     * @return boolean
     */
    public function isAvailable()
    {
        return $this->isAvailable;
    }
    /**
     * @param boolean $isAvailable
     */
    public function setIsAvailable($isAvailable)
    {
        $this->isAvailable = $isAvailable;
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->getName(),
            'user' => $this->getUser(),
            'path' => $this->getPath(),
            'langcode' => $this->getLangcode()
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
