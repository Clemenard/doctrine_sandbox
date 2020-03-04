<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="python_exercises")
 */
class ExercisePython
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\Column(name="link_solution", type="string", length=255, nullable=true)
     * @var string
     */
    private $linkSolution = null;
    /**
     * @ORM\OneToOne(targetEntity=ProjectPython::class)
     * @ORM\JoinColumn(name="id_project", referencedColumnName="id", onDelete="CASCADE")
     * @var ProjectPython
     */
    private $project;
    /**
     * @ORM\Column(name="secret_word", type="string", length=100, nullable=true)
     * @var string
     */
    private $secretWord = null;
    /**
     * @ORM\Column(name="function_name", type="string", length=100, nullable=false)
     * @var string
     */
    private $functionName;

    public function __construct($functionName)
    {
        if ($functionName === null) {
            throw new EntityDataIntegrityException("functionName cannot be null");
        }

        if (is_string($functionName)) {
            $this->functionName = $functionName;
        } else {
            throw new EntityDataIntegrityException("functionName needs to be string");
        }
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLinkSolution()
    {
        return $this->linkSolution;
    }

    /**
     * @return ProjectPython
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @return string
     */
    public function getSecretWord()
    {
        return $this->secretWord;
    }

    /**
     * @return string
     */
    public function getFunctionName()
    {
        return $this->functionName;
    }

    /**
     * @param int $id
     * @return integer
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $linkSolution
     */
    public function setLinkSolution($id)
    {
        $this->linkSolution = $id;
    }

    /**
     * @param ProjectPython $project
     */
    public function setProject($project)
    {
        if ($project instanceof ProjectPython) {
            $this->project = $project;
        } else {
            throw new EntityDataIntegrityException("project needs to be an instance of ProjectPython");
        }
    }

    /**
     * @param string $secretWord
     */
    public function setSecretWord($secretWord)
    {
        $this->secretWord = $secretWord;
    }

    /**
     * @param string $functionName
     */
    public function setFunctionName($functionName)
    {
        if ($functionName === null) {
            throw new EntityDataIntegrityException("functionName cannot be null");
        }

        if (is_string($functionName)) {
            $this->functionName = $functionName;
        } else {
            throw new EntityDataIntegrityException("functionName needs to be string");
        }
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'linkSolution' => $this->getLinkSolution(),
            'project' => $this->getProject(),
            'secretWord' => $this->getSecretWord(),
            'functionName' => $this->getFunctionName(),
        ];
    }
}
