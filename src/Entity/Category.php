<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="shop_categories")
 */
class Category
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\Column(name="title_fr", type="string", length=250, nullable=false)
     * @var string
     */
    private $titleFr;
    /**
     * @ORM\Column(name="title_en", type="string", length=250, nullable=false)
     * @var string
     */
    private $titleEn;
    /**
     * @ORM\Column(name="color", type="string", length=6, nullable=true)
     * @var string
     */
    private $color;
    /**
     * @ORM\Column(name="indexPos", type="integer", length=3, nullable=true)
     * @var string
     */
    private $indexPos;
    /**
     * @ORM\Column(name="visible", type="boolean", nullable=false, options={"default":true})
     * @var string
     */
    private $isVisible;

    public function __construct($titleFr = "", $titleEn = "", $color = "", $indexPos = "", $isVisible = 0)
    {
        $this->setTitleFr($titleFr);
        $this->setTitleEn($titleEn);
        $this->setColor($color);
        $this->setIndexPos($indexPos);
        $this->setIsVisible($isVisible);
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
    public function getTitleFr()
    {
        return $this->titleFr;
    }
    /**
     * @param string $titleFr
     */
    public function setTitleFr($titleFr)
    {
        $this->titleFr = $titleFr;
    }
    /**
     * @return string
     */
    public function getTitleEn()
    {
        return $this->titleEn;
    }
    /**
     * @param string $titleEn
     */
    public function setTitleEn($titleEn)
    {
        $this->titleEn = $titleEn;
    }
    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }
    /**
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }
    /**
     * @return integer
     */
    public function getIndexPos()
    {
        return $this->indexPos;
    }
    /**
     * @param integer $indexPos
     */
    public function setIndexPos($indexPos)
    {
        $this->indexPos = $indexPos;
    }
    /**
     * @return boolean 
     */
    public function isVisible()
    {
        return $this->isVisible;
    }
    /**
     * @param boolean $isVisible
     */
    public function setIsVisible($isVisible)
    {
        $this->isVisible = $isVisible;
    }
    public function jsonSerialize()
    {
        return [
            'titleFr' => $this->getTitleFr(),
            'titleEn' => $this->getTitleEn(),
            'color' => $this->getColor(),
            'indexPos' => $this->getIndexPos(),
            'isVisible' => $this->isVisible()
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
