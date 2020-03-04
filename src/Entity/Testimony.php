<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="index_testimonies")
 */
class Testimony
{

    /** 
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\Column(name="role_fr", type="string", length=250, nullable=false)
     * @var string
     */
    private $roleFr;
    /**
     * @ORM\Column(name="role_en", type="string", length=250, nullable=false)
     * @var string
     */
    private $roleEn;
    /**
     * @ORM\Column(name="testimony_fr", type="string", length=2500, nullable=false)
     * @var string
     */
    private $testimonyFr;
    /**
     * @ORM\Column(name="testimony_en", type="string", length=2500, nullable=false)
     * @var string
     */
    private $testimonyEn;
    /**
     * @ORM\Column(name="index_order", type="integer", length=3,nullable=false)
     * @var int
     */
    private $indexOrder;
    /**
     * @ORM\Column(name="is_deleted", type="boolean", nullable=false,options={"default":false})
     * @var boolean
     */
    private $isDeleted;

    public function __construct($roleFr = "", $roleEn = "", $testimonyFr = '', $testimonyEn = "", $indexOrder = 0)
    {
        $this->setRoleFr($roleFr);
        $this->setRoleEn($roleEn);
        $this->setTestimonyFr($testimonyFr);
        $this->setTestimonyEn($testimonyEn);
        $this->setIndexOrder($indexOrder);
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
    public function getRoleFr()
    {
        return $this->roleFr;
    }
    /**
     * @param string $roleFr
     */
    public function setRoleFr($roleFr)
    {
        $this->roleFr = $roleFr;
    }
    /**
     * @return string 
     */
    public function getRoleEn()
    {
        return $this->roleEn;
    }
    /**
     * @param string $roleEn
     */
    public function setRoleEn($roleEn)
    {
        $this->roleEn = $roleEn;
    }
    /**
     * @return string 
     */
    public function getTestimonyFr()
    {
        return $this->testimonyFr;
    }
    /**
     * @param string $testimonyFr
     */
    public function setTestimonyFr($testimonyFr)
    {
        $this->testimonyFr = $testimonyFr;
    }
    /**
     * @return string 
     */
    public function getTestimonyEn()
    {
        return $this->testimonyEn;
    }
    /**
     * @param string $testimonyEn
     */
    public function setTestimonyEn($testimonyEn)
    {
        $this->testimonyEn = $testimonyEn;
    }
    /**
     * @return integer
     */
    public function getIndexOrder()
    {
        return $this->indexOrder;
    }
    /**
     * @param integer $indexOrder
     */
    public function setIndexOrder($indexOrder)
    {
        $this->indexOrder = $indexOrder;
    }
    /**
     * @return boolean
     */
    public function isDeleted()
    {
        return $this->isDeleted;
    }
    /**
     * @param boolean $isDeleted
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;
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
            'roleFr' => $this->encodeURIComponent($this->getRoleFr()),
            'roleEn' => $this->encodeURIComponent($this->getRoleEn()),
            'testimonyFr' => $this->encodeURIComponent($this->getTestimonyFr()),
            'testimonyEn' => $this->encodeURIComponent($this->getTestimonyEn()),
            'indexOrder' => $this->getIndexOrder()
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
