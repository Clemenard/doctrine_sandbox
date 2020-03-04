<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="shop_exploded_pictures")
 */
class ExplodedPicture
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\OneToOne(targetEntity=Product::class)
     * @ORM\JoinColumn(name="id_product", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * @var Product
     */
    private $product;
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
     * @ORM\Column(name="description_fr", type="text", length=2000, nullable=false)
     * @var string
     */
    private $descriptionFr;
    /**
     * @ORM\Column(name="description_en", type="text", length=2000, nullable=false)
     * @var string
     */
    private $descriptionEn;
    /**
     * @ORM\Column(name="posX", type="integer", length=2, nullable=false)
     * @var integer
     */
    private $posX;
    /**
     * @ORM\Column(name="posY", type="integer", length=2, nullable=false)
     * @var integer
     */
    private $posY;
    /**
     * @ORM\Column(name="indexPont", type="integer", length=2, nullable=false)
     * @var integer
     */
    private $indexPoint;

    public function __construct($product = "", $titleFr = "", $titleEn = "", $descriptionFr = "", $descriptionEn = "", $posX = 0, $posY = 0, $indexPoint = 0)
    {
        $this->setProduct($product);
        $this->setTitleFr($titleFr);
        $this->setTitleEn($titleEn);
        $this->setDescriptionFr($descriptionFr);
        $this->setDescriptionEn($descriptionEn);
        $this->setPosX($posX);
        $this->setPosY($posY);
        $this->setIndexPoint($indexPoint);
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
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }
    /**
     * @param Product $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
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
    public function getDescriptionFr()
    {
        return $this->descriptionFr;
    }
    /**
     * @param string $descriptionFr
     */
    public function setDescriptionFr($descriptionFr)
    {
        $this->descriptionFr = $descriptionFr;
    }
    /**
     * @return string
     */
    public function getDescriptionEn()
    {
        return $this->descriptionEn;
    }
    /**
     * @param string $descriptionEn
     */
    public function setDescriptionEn($descriptionEn)
    {
        $this->descriptionEn = $descriptionEn;
    }
    /**
     * @return integer
     */
    public function getOrderFaq()
    {
        return $this->orderFaq;
    }
    /**
     * @param integer $orderFaq
     */
    public function setOrderFaq($orderFaq)
    {
        $this->orderFaq = $orderFaq;
    }
    /**
     * @return integer
     */
    public function getPosX()
    {
        return $this->posX;
    }
    /**
     * @param integer $posX
     */
    public function setPosX($posX)
    {
        $this->posX = $posX;
    }
    /**
     * @return integer
     */
    public function getPosY()
    {
        return $this->posY;
    }
    /**
     * @param integer $posY
     */
    public function setPosY($posY)
    {
        $this->posY = $posY;
    }
    /**
     * @return integer
     */
    public function getIndexPoint()
    {
        return $this->indexPoint;
    }
    /**
     * @param integer $indexPoint
     */
    public function setIndexPoint($indexPoint)
    {
        $this->indexPoint = $indexPoint;
    }
    public function jsonSerialize()
    {
        return [
            'product' => $this->getProduct(),
            'titleFr' => $this->getTitleFr(),
            'titleEn' => $this->getTitleEn(),
            'descriptionFr' => $this->getDescriptionFr(),
            'descriptionEn' => $this->getDescriptionEn(),
            'posX' => $this->getPosX(),
            'posY' => $this->getPosY(),
            'indexPoint' => $this->getIndexPoint(),
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
