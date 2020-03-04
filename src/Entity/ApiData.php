<?php
//this table will be refactored
namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="api_data")
 */
class ApiData
{

    /** 
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(name="userRef", referencedColumnName="id", onDelete="CASCADE")
     * @var User
     */
    private $user;
    /**
     * @ORM\ManyToOne(targetEntity=ProjectArduino::class)
     * @ORM\JoinColumn(name="projectID", referencedColumnName="id", onDelete="CASCADE")
     * @var ProjectArduino
     */
    private $project;
    /**
     * @ORM\Column(name="data", type="text", nullable=false)
     * @var string
     */
    private $data;
    /**
     * @ORM\Column(name="lastupdate", type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     * @var \DateTime
     */
    private $lastUpdate;
    /**
     * @ORM\Column(name="remove", type="boolean", nullable=false,options={"default":false})
     * @var boolean
     */
    private $isDeleted;

    public function __construct($user = "", $project = "", $data = '', $lastUpdate = "")
    {
        $this->setUser($user);
        $this->setProject($project);
        $this->setData($data);
        $this->setLastUpdate($lastUpdate);
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
     * @return ProjectArduino
     */
    public function getProject()
    {
        return $this->project;
    }
    /**
     * @param ProjectArduino $project
     */
    public function setProject($project)
    {
        $this->project = $project;
    }
    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }
    /**
     * @param string $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
    /**
     * @return \DateTime
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }
    /**
     * @param \DateTime $lastUpdate
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
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

    public function jsonSerialize()
    {
        return [
            'project' => $this->getProject(),
            'user' => $this->getUser(),
            'lastUpdate' => $this->getLastUpdate(),
            'data' => $this->getData()
        ];
    }
}
