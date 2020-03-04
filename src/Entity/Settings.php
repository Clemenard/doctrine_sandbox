<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="settings")
 */
class Settings
{
    /** 
     * @ORM\Id
     * @ORM\Column(name="id", type="string", length=250)
     */
    private $id;
    /**
     * @ORM\Column(name="value", type="text", length=2000,nullable=false)
     * @var string
     */
    private $value;

    public function __construct($id = "", $value = "")
    {
        $this->setId($id);
        $this->setValue($value);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    public function jsonSerialize()
    {
        return [
            'value' => $this->getValue(),
            'id' => $this->getId()
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
