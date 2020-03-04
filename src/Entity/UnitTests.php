<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="python_tests")
 */
class UnitTests
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ExercisePython::class)
     * @ORM\JoinColumn(name="id_exercise", referencedColumnName="id", onDelete="CASCADE")
     * @var ExercisePython
     */
    private $exercise;
    /**
     * @ORM\Column(name="hint", type="string", length=240, nullable=true)
     * @var string
     */
    private $hint =  null;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return ExercisePython
     */
    public function getExercise()
    {
        return $this->exercise;
    }

    /**
     * @return string
     */
    public function getHint()
    {
        return $this->hint;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param ExercisePython $exercise
     */
    public function setIdExercise($exercise)
    {
        if ($exercise instanceof ExercisePython) {
            $this->exercise = $exercise;
        } else {
            throw new EntityDataIntegrityException("exercise needs to be an instance of ExercisePython");
        }
    }

    /**
     * @param string $hint
     */
    public function setHint($hint)
    {
        if (is_string($hint)) {
            $this->hint = $hint;
        } else {
            throw new EntityDataIntegrityException("hint needs to be string");
        }
    }



    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'exercise' => $this->getExercise(),
            'hint' => $this->getHint()
        ];
    }
}
