<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="shop_coupons")
 */
class Coupon
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
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(name="user", referencedColumnName="id", onDelete="CASCADE")
     * @var User
     */
    private $user;
    /**
     * @ORM\Column(name="value", type="integer", length=250, nullable=false)
     * @var integer
     */
    private $value;
    /**
     * @ORM\Column(name="reduction", type="integer", length=250, nullable=false)
     * @var integer
     */
    private $reduction;
    /**
     * @ORM\Column(name="used", type="boolean", nullable=false)
     * @var boolean
     */
    private $isUsed;
    /**
     * @ORM\Column(name="use_limit", type="integer", length=6, nullable=false)
     * @var integer
     */
    private $useLimit;
    /**
     * @ORM\Column(name="expire", type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     * @var \DateTime
     */
    private $expire;

    public function __construct($product = "", $user = "", $useLimit = 0, $reduction = 0, $isUsed = 0, $value = 0, $expire = '')
    {
        $this->setProduct($product);
        $this->setUser($user);
        $this->setUseLimit($useLimit);
        $this->setReduction($reduction);
        $this->setIsUsed($isUsed);
        $this->setValue($value);
        $this->setExpire($expire);
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
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }
    /**
     * @param int $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
    /**
     * @return int
     */
    public function getReduction()
    {
        return $this->reduction;
    }
    /**
     * @param integer $reduction
     */
    public function setReduction($reduction)
    {
        $this->reduction = $reduction;
    }
    /**
     * @return boolean
     */
    public function getIsUsed()
    {
        return $this->isUsed;
    }
    /**
     * @param boolean $isUsed
     */
    public function setIsUsed($isUsed)
    {
        $this->isUsed = $isUsed;
    }
    /**
     * @return int
     */
    public function getUseLimit()
    {
        return $this->useLimit;
    }
    /**
     * @param integer $useLimit
     */
    public function setUseLimit($useLimit)
    {
        $this->useLimit = $useLimit;
    }
    /**
     * @return \DateTime
     */
    public function getExpire()
    {
        return $this->expire;
    }
    /**
     * @param \DateTime $expire
     */
    public function setExpire($expire)
    {
        $this->expire = $expire;
    }
    public function jsonSerialize()
    {
        return [
            'product' => $this->getProduct(),
            'user' => $this->getUser(),
            'value' => $this->getValue(),
            'useLimit' => $this->getUseLimit(),
            'expire' => $this->getExpire(),
            'isUsed' => $this->getIsUsed(),
            'reduction' => $this->getReduction()
        ];
    }
}
