<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="vittamap_videos")
 */
class Video
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity=Experiment::class)
     * @ORM\JoinColumn(name="exp_video_experiment", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * @var Experiment
     */
    private $experiment;
    /**
     * @ORM\Column(name="exp_video_name", type="string", length=250, nullable=false)
     * @var string
     */
    private $name;
    /**
     * @ORM\Column(name="exp_video_like", type="integer", length=9, nullable=false,options={"default":0})
     * @var integer
     */
    private $like;
    public function __construct($experiment = "", $name = "", $like = 0)
    {
        $this->setExperiment($experiment);
        $this->setName($name);
        $this->setLike($like);
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
    public function getLike()
    {
        return $this->like;
    }
    /**
     * @param integer $like
     */
    public function setLike($like)
    {
        $this->like = $like;
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
            'like' => $this->getLike()
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
