<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="vittamap_data_fields")
 */
class DataField
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\Column(name="title", type="string",length=250, nullable=false)
     * @var string
     */
    private $title = "";
    /**
     * @ORM\Column(name="unit", type="string",length=10, nullable=false)
     * @var string
     */
    private $unit = "";
    public function __construct($title = "", $unit = "")
    {
        $this->setTitle($title);
        $this->setUnit($unit);
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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }
    /**
     * @param string $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    }
    public function jsonSerialize()
    {
        return [
            'title' => $this->getTitle(),
            'unit' => $this->getUnit(),
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
