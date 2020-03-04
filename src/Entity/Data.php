<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="vittamap_data")
 */
class Data
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity=Experiment::class)
     * @ORM\JoinColumn(name="id_exp", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * @var Experiment
     */
    private $experiment;
    /**
     * @ORM\Column(name="date_input", type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     * @var \DateTime
     */
    private $dateInput;
    /**
     * @ORM\Column(name="descr", type="text", nullable=true)
     * @var string
     */
    private $description = "";
    /**
     * @ORM\Column(name="csv_file", type="string",length=250, nullable=true)
     * @var string
     */
    private $csvFile = "";
    public function __construct($experiment = "", $dateInput = "", $description = "", $csvFile = "")
    {
        $this->setExperiment($experiment);
        $this->setDateInput($dateInput);
        $this->setDescription($description);
        $this->setCsvFile($csvFile);
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
     * @return \DateTime
     */
    public function getDateInput()
    {
        return $this->dateInput;
    }
    /**
     * @param \DateTime $dateInput
     */
    public function setDateInput($dateInput)
    {
        $this->dateInput = $dateInput;
    }
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    /**
     * @return string
     */
    public function getCsvFile()
    {
        return $this->csvFile;
    }
    /**
     * @param string $csvFile
     */
    public function setCsvFile($csvFile)
    {
        $this->csvFile = $csvFile;
    }
    public function jsonSerialize()
    {
        return [
            'experiment' => $this->getExperiment(),
            'description' => $this->getDescription(),
            'dateInput' => $this->getDateInput(),
            'csvFile' => $this->getCsvFile(),
        ];
    }
}
