<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="vittamap_classes")
 */
class SchoolClass
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\OneToMany(targetEntity=Experiment::class, mappedBy="school_id")
     * @ORM\JoinColumn(name="exp_class_exp_ref", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * @var Experiment
     */
    private $experiment;
    /**
     * @ORM\Column(name="exp_class_name", type="string", length=250, nullable=true)
     * @var string
     */
    private $name;
    /**
     * @ORM\Column(name="exp_class_grade", type="integer", length=3, nullable=true)
     * @var integer
     */
    private $grade;
    public function __construct($experiment = "", $name = "", $grade = 0)
    {
        $this->setExperiment($experiment);
        $this->setName($name);
        $this->setGrade($grade);
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
     * @return Experiment
     */
    public function getExperiment()
    {
        return $this->experiment;
    }
    /**
     * @param Experiment $experiment
     */
    public function setExperiment($experiment)
    {
        $this->experiment = $experiment;
    }
    /**
     * @return integer 
     */
    public function getGrade()
    {
        return $this->grade;
    }
    /**
     * @param integer $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }
    /**
     * @return integer 
     */
    public function getName()
    {
        return $this->grade;
    }
    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    public function jsonSerialize()
    {
        return [
            'experiment' => $this->getExperiment(),
            'name' => $this->getName(),
            'grade' => $this->getGrade()
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
