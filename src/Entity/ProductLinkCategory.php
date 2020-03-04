<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="shop_products_link_categories")
 */
class ProductLinkCategory
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity=Product::class)
     * @ORM\JoinColumn(name="id_product", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * @var Product
     */
    private $product;
    /**
     * @ORM\ManyToOne(targetEntity=Category::class)
     * @ORM\JoinColumn(name="id_category", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * @var Category
     */
    private $category;
    public function __construct($product = "", $category = "")
    {
        $this->setProduct($product);
        $this->setCategory($category);
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
     * @return Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * @param Category $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }
    public function jsonSerialize()
    {
        return [
            'product' => $this->getProduct(),
            'category' => $this->getCategory(),
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
