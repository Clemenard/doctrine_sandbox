<?php
# src/Entity/Participation.php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="lesson",
 *   uniqueConstraints={
 *       @ORM\UniqueConstraint(name="chapter_tutorial_unique", columns={"chapter_id", "tutorial_id"})
 *   }
 *  )
 */
class Lesson
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity=Chapter::class, inversedBy="lesson")
     */
    protected $chapter;

    /**
     * @ORM\ManyToOne(targetEntity=Tutorial::class, inversedBy="lesson")
     */
    protected $tutorial;

    public function __toString()
    {
        $format = "Participation (Id: %s, %s, %s)\n";
        return sprintf($format, $this->id, $this->user, $this->poll);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getChapter()
    {
        return $this->chapter;
    }

    public function setChapter($chapter)
    {
        $this->chapter = $chapter;
    }

    public function getTutorial()
    {
        return $this->tutorial;
    }

    public function setTutorial($tutorial)
    {
        $this->tutorial = $tutorial;
    }
}
