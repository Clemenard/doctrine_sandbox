<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="shop_products")
 */
class Product
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\Column(name="title_fr", type="string", length=200, nullable=false)
     * @var string
     */
    private $titleFr;
    /**
     * @ORM\Column(name="title_en", type="string", length=200, nullable=false)
     * @var string
     */
    private $titleEn;
    /**
     * @ORM\Column(name="desc_fr", type="text", length=2000, nullable=false)
     * @var string
     */
    private $descriptionFr;
    /**
     * @ORM\Column(name="desc_en", type="text", length=2000, nullable=false)
     * @var string
     */
    private $descriptionEn;
    /**
     * @ORM\Column(name="price_HT", type="float", nullable=false)
     * @var string
     */
    private $priceHt;
    /**
     * @ORM\Column(name="front_img", type="text", length=250, nullable=false)
     * @var string
     */
    private $frontImg;
    /**
     * @ORM\Column(name="back_img", type="text", length=250, nullable=false)
     * @var string
     */
    private $backImg;
    /**
     * @ORM\Column(name="exploded_img", type="text", length=250, nullable=true)
     * @var string
     */
    private $explodedImg;
    /**
     * @ORM\Column(name="soldout", type="boolean", length=2000, nullable=false, options={"default":false})
     * @var string
     */
    private $isSoldout;
    /**
     * @ORM\Column(name="visible", type="boolean", length=2000, nullable=false, options={"default":true})
     * @var string
     */
    private $isVisible;
    /**
     * @ORM\Column(name="is_microbit", type="boolean", length=2000, nullable=false, options={"default":false})
     * @var string
     */
    private $isMicrobit;
    /**
     * @ORM\Column(name="is_arduino", type="boolean", length=2000, nullable=false, options={"default":false})
     * @var string
     */
    private $isArduino;
    /**
     * @ORM\Column(name="is_block_microbit", type="boolean", length=2000, nullable=false, options={"default":false})
     * @var string
     */
    private $isBlockMicrobit;
    /**
     * @ORM\Column(name="is_block_arduino", type="boolean", length=2000, nullable=false, options={"default":false})
     * @var string
     */
    private $isBlockArduino;
    /**
     * @ORM\ManyToOne(targetEntity=Tutorial::class)
     * @ORM\JoinColumn(name="id_tuto_microbit", referencedColumnName="id", onDelete="CASCADE", nullable=true)
     * @var Tutorial
     */
    private $tutorialMicrobit;
    /**
     * @ORM\ManyToOne(targetEntity=Tutorial::class)
     * @ORM\JoinColumn(name="id_tuto_arduino", referencedColumnName="id", onDelete="CASCADE", nullable=true)
     * @var Tutorial
     */
    private $tutorialArduino;
    /**
     * @ORM\ManyToOne(targetEntity=Tutorial::class)
     * @ORM\JoinColumn(name="id_tuto_extra1", referencedColumnName="id", onDelete="CASCADE", nullable=true)
     * @var Tutorial
     */
    private $tutorialExtra1;
    /**
     * @ORM\ManyToOne(targetEntity=Tutorial::class)
     * @ORM\JoinColumn(name="id_tuto_extra2", referencedColumnName="id", onDelete="CASCADE", nullable=true)
     * @var Tutorial
     */
    private $tutorialExtra2;
    /**
     * @ORM\Column(name="reference", type="string", length=10, nullable=false)
     * @var string
     */
    private $reference;
    /**
     * @ORM\Column(name="power_supply", type="text", length=2000, nullable=true)
     * @var string
     */
    private $powerSupply;
    /**
     * @ORM\Column(name="transmission", type="text", length=2000, nullable=true)
     * @var string
     */
    private $transmission;
    /**
     * @ORM\ManyToOne(targetEntity=Experiment::class)
     * @ORM\JoinColumn(name="id_experiment1", referencedColumnName="id", onDelete="CASCADE", nullable=true)
     * @var Experiment
     */
    private $experiment1;
    /**
     * @ORM\ManyToOne(targetEntity=Experiment::class)
     * @ORM\JoinColumn(name="id_experiment1", referencedColumnName="id", onDelete="CASCADE", nullable=true)
     * @var Experiment
     */
    private $experiment2;
    /**
     * @ORM\ManyToOne(targetEntity=Product::class)
     * @ORM\JoinColumn(name="id_related_product1", referencedColumnName="id", onDelete="CASCADE", nullable=true)
     * @var Product
     */
    private $relatedProduct1;
    /**
     * @ORM\ManyToOne(targetEntity=Product::class)
     * @ORM\JoinColumn(name="id_related_product2", referencedColumnName="id", onDelete="CASCADE", nullable=true)
     * @var Product
     */
    private $relatedProduct2;
    /**
     * @ORM\ManyToOne(targetEntity=Product::class)
     * @ORM\JoinColumn(name="id_related_product3", referencedColumnName="id", onDelete="CASCADE", nullable=true)
     * @var Product
     */
    private $relatedProduct3;

    /**
     * Product constructor
     * @param string $titleFr
     * @param string $titleEn
     * @param string $descriptionFr
     * @param string $descriptionEn
     * @param float $priceHt
     * @param string $frontImg
     * @param string $backImg
     * @param boolean $isSoldout
     * @param boolean $isVisible
     * @param boolean $isMicrobit
     * @param boolean $isArduino
     * @param boolean $isBlockArduino
     * @param boolean $isBlockMicrobit
     * @param string $reference
     * @param string $powerSupply
     * @param string $transmission
     * @param Tutorial $tutorialArduino
     * @param Tutorial $tutorialMicrobit
     * @param Tutorial $tutorialExtra1
     * @param Tutorial $tutorialExtra2
     * @param Experiment $experiment1
     * @param Experiment $experiment2
     * @param Product $relatedProduct1
     * @param Product $relatedProduct2
     * @param Product $relatedProduct3
     */
    public function __construct($titleFr = "", $titleEn = "", $descriptionFr = "", $descriptionEn = "", $priceHt = 0.0, $frontImg = "", $backImg = "",  $isSoldout = 0, $isVisible = 1, $isMicrobit = 0, $isArduino = 0, $isBlockArduino = 0, $isBlockMicrobit = 0, $reference = "", $powerSupply = "", $transmission = "", $tutorialArduino = 0, $tutorialMicrobit = 0, $tutorialExtra1 = 0, $tutorialExtra2 = 0, $experiment1 = 0, $experiment2 = 0, $relatedProduct1 = 0, $relatedProduct2 = 0, $relatedProduct3 = 0, $explodedImg = '')
    {
        $this->setTitleFr($titleFr);
        $this->setTitleEn($titleEn);
        $this->setDescriptionFr($descriptionFr);
        $this->setDescriptionEn($descriptionEn);
        $this->setPriceHt($priceHt);
        $this->setFrontImg($frontImg);
        $this->setBackImg($backImg);
        $this->setExplodedImg($explodedImg);
        $this->setIsSoldout($isSoldout);
        $this->setIsVisible($isVisible);
        $this->setIsMicrobit($isMicrobit);
        $this->setIsArduino($isArduino);
        $this->setIsBlockArduino($isBlockArduino);
        $this->setIsBlockMicrobit($isBlockMicrobit);
        $this->setTutorialArduino($tutorialArduino);
        $this->setTutorialMicrobit($tutorialMicrobit);
        $this->setTutorialExtra1($tutorialExtra1);
        $this->setTutorialExtra2($tutorialExtra2);
        $this->setExperiment1($experiment1);
        $this->setExperiment2($experiment2);
        $this->setRelatedProduct1($relatedProduct1);
        $this->setRelatedProduct2($relatedProduct2);
        $this->setRelatedProduct3($relatedProduct3);
        $this->setReference($reference);
        $this->setPowerSupply($powerSupply);
        $this->setTransmission($transmission);
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
     * @return float 
     */
    public function getPriceHt()
    {
        return $this->priceHt;
    }
    /**
     * @param float $priceHt
     */
    public function setPriceHt($priceHt)
    {
        $this->priceHt = $priceHt;
    }
    /**
     * @return string 
     */
    public function getFrontImg()
    {
        return $this->frontImg;
    }
    /**
     * @param string $explodedImg
     */
    public function setFrontImg($frontImg)
    {
        $this->frontImg = $frontImg;
    }
    /**
     * @return string 
     */
    public function getBackImg()
    {
        return $this->backImg;
    }
    /**
     * @param string $explodedImg
     */
    public function setBackImg($backImg)
    {
        $this->backImg = $backImg;
    }
    /**
     * @return string 
     */
    public function getExplodedImg()
    {
        return $this->explodedImg;
    }
    /**
     * @param string $explodedImg
     */
    public function setExplodedImg($explodedImg)
    {
        $this->explodedImg = $explodedImg;
    }
    /**
     * @return boolean 
     */
    public function isSoldout()
    {
        return $this->isSoldout;
    }
    /**
     * @param boolean $isSoldout
     */
    public function setIsSoldout($isSoldout)
    {
        $this->isSoldout = $isSoldout;
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
    /**
     * @return boolean 
     */
    public function isMicrobit()
    {
        return $this->isMicrobit;
    }
    /**
     * @param boolean $isMicrobit
     */
    public function setIsMicrobit($isMicrobit)
    {
        $this->isMicrobit = $isMicrobit;
    }
    /**
     * @return boolean 
     */
    public function isArduino()
    {
        return $this->isArduino;
    }
    /**
     * @param boolean $isArduino
     */
    public function setIsArduino($isArduino)
    {
        $this->isArduino = $isArduino;
    }
    /**
     * @return boolean 
     */
    public function isBlockMicrobit()
    {
        return $this->isBlockMicrobit;
    }
    /**
     * @param boolean $isBlockMicrobit
     */
    public function setIsBlockMicrobit($isBlockMicrobit)
    {
        $this->isBlockMicrobit = $isBlockMicrobit;
    }
    /**
     * @return boolean 
     */
    public function isBlockArduino()
    {
        return $this->isBlockArduino;
    }
    /**
     * @param boolean $isBlockArduino
     */
    public function setIsBlockArduino($isBlockArduino)
    {
        $this->isBlockArduino = $isBlockArduino;
    }
    /**
     * @return Tutorial 
     */
    public function getTutorialMicrobit()
    {
        return $this->tutorialMicrobit;
    }
    /**
     * @param Tutorial $tutorialMicrobit
     */
    public function setTutorialMicrobit($tutorialMicrobit)
    {
        $this->tutorialMicrobit = $tutorialMicrobit;
    }
    /**
     * @return Tutorial 
     */
    public function getTutorialArduino()
    {
        return $this->tutorialArduino;
    }
    /**
     * @param Tutorial $tutorialArduino
     */
    public function setTutorialArduino($tutorialArduino)
    {
        $this->tutorialArduino = $tutorialArduino;
    }
    /**
     * @return Tutorial 
     */
    public function getTutorialExtra1()
    {
        return $this->tutorialExtra1;
    }
    /**
     * @param Tutorial $tutorialExtra1
     */
    public function setTutorialExtra1($tutorialExtra1)
    {
        $this->tutorialExtra1 = $tutorialExtra1;
    }
    /**
     * @return Tutorial 
     */
    public function getTutorialExtra2()
    {
        return $this->tutorialExtra2;
    }
    /**
     * @param Tutorial $tutorialExtra2
     */
    public function setTutorialExtra2($tutorialExtra2)
    {
        $this->tutorialExtra2 = $tutorialExtra2;
    }
    /**
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }
    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }
    /**
     * @return string 
     */
    public function getPowerSupply()
    {
        return $this->powerSupply;
    }
    /**
     * @param string $powerSupply
     */
    public function setPowerSupply($powerSupply)
    {
        $this->powerSupply = $powerSupply;
    }
    /**
     * @return string 
     */
    public function getTransmission()
    {
        return $this->transmission;
    }
    /**
     * @param string $transmission
     */
    public function setTransmission($transmission)
    {
        $this->transmission = $transmission;
    }
    /**
     * @return Experiment 
     */
    public function getExperiment1()
    {
        return $this->experiment1;
    }
    /**
     * @param Experiment $experiment1
     */
    public function setExperiment1($experiment1)
    {
        $this->experiment1 = $experiment1;
    }
    /**
     * @return Experiment 
     */
    public function getExperiment2()
    {
        return $this->experiment2;
    }
    /**
     * @param Experiment $experiment2
     */
    public function setExperiment2($experiment2)
    {
        $this->experiment2 = $experiment2;
    }
    /**
     * @return Product 
     */
    public function getRelatedProduct1()
    {
        return $this->relatedProduct1;
    }
    /**
     * @param Product $relatedProduct1
     */
    public function setRelatedProduct1($relatedProduct1)
    {
        $this->relatedProduct1 = $relatedProduct1;
    }
    /**
     * @return Product 
     */
    public function getRelatedProduct2()
    {
        return $this->relatedProduct2;
    }
    /**
     * @param Product $relatedProduct2
     */
    public function setRelatedProduct2($relatedProduct2)
    {
        $this->relatedProduct2 = $relatedProduct2;
    }
    /**
     * @return Product 
     */
    public function getRelatedProduct3()
    {
        return $this->relatedProduct3;
    }
    /**
     * @param Product $relatedProduct3
     */
    public function setRelatedProduct3($relatedProduct3)
    {
        $this->relatedProduct3 = $relatedProduct3;
    }
    private function decodeURIComponent($str)
    {
        $revert = array('!' => '%21', '*' => '%2A', "'" => '%27', '(' => '%28', ')' => '%29');
        $str = strtr($str, $revert);
        return rawurldecode($str);
    }

    private function encodeURIComponent($str)
    {
        $revert = array('%21' => '!', '%2A' => '*', '%27' => "'", '%28' => '(', '%29' => ')');
        return strtr(rawurlencode($str), $revert);
    }
    public function jsonSerialize()
    {
        return [
            'titleFr' => $this->encodeURIComponent($this->getTitleFr()),
            'titleEn' => $this->encodeURIComponent($this->getTitleEn()),
            'descriptionFr' => $this->encodeURIComponent($this->getDescriptionFr()),
            'descriptionEn' => $this->encodeURIComponent($this->getDescriptionEn()),
            'priceHt' => $this->getPriceHt(),
            'frontImg' => $this->getFrontImg(),
            'backImg' => $this->getBackImg(),
            'explodedImg' => $this->getExplodedImg(),
            'isSoldout' => $this->isSoldout(),
            'isVisible' => $this->isVisible(),
            'isMicrobit' => $this->isMicrobit(),
            'isArduino' => $this->isArduino(),
            'isBlockMicrobit' => $this->isBlockMicrobit(),
            'isBlockArduino' => $this->isBlockArduino(),
            'tutorialMicrobit' => $this->getTutorialMicrobit(),
            'tutorialArduino' => $this->getTutorialArduino(),
            'tutorialExtra1' => $this->getTutorialExtra1(),
            'tutorialExtra2' => $this->getTutorialExtra2(),
            'experiment1' => $this->getExperiment1(),
            'experiment2' => $this->getExperiment2(),
            'relatedProduct1' => $this->getRelatedProduct1(),
            'relatedProduct2' => $this->getRelatedProduct2(),
            'relatedProduct3' => $this->getRelatedProduct3(),
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
