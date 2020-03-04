<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="vittamap_data_link_data_fields")
 */
class DataLinkDataField
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity=Data::class)
     * @ORM\JoinColumn(name="id_data", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * @var Data
     */
    private $data;
    /**
     * @ORM\ManyToOne(targetEntity=DataField::class)
     * @ORM\JoinColumn(name="id_data_field", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * @var DataField
     */
    private $dataField;
    /**
     * @ORM\Column(name="value_data", type="integer", length=11, nullable=false)
     * @var integer
     */
    private $valueData;

    public function __construct()
    {
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
     * @return Data
     */
    public function getData()
    {
        return $this->data;
    }
    /**
     * @param Data $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
    /**
     * @return DataField 
     */
    public function getDataField()
    {
        return $this->dataField;
    }
    /**
     * @param DataField $dataField
     */
    public function setDataField($dataField)
    {
        $this->dataField = $dataField;
    }
    /**
     * @return integer
     */
    public function getValueData()
    {
        return $this->valueData;
    }
    /**
     * @param int $valueData
     */
    public function setValueData($valueData)
    {
        $this->valueData = $valueData;
    }
    public function jsonSerialize()
    {
        return [
            'data' => $this->getData(),
            'dataField' => $this->getDataField(),
            'valueData' => $this->getValueData()
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
