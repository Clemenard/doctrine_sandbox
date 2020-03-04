<?php
# src/Entity/Question.php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="learn_collections")
 */
class Collection
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity=Chapter::class, cascade={"persist", "remove"}, mappedBy="collection_id")
     */
    protected $chapter;

    /**
     * @ORM\Column(name="name_collection", type="string", length=100, nullable=false, options={"default":"Unamed"})
     * @var string
     */
    private $nameCollection = "Unamed";
    /**
     * @ORM\Column(name="grade_collection", type="string", length=100, nullable=false, options={"default":"Unamed"})
     * @var string
     */
    private $gradeCollection = "Unamed";
    public function __construct()
    {
        $this->chapter = new ArrayCollection();
    }
    public function __toString()
    {
        $format = "Question (id: %s, wording: %s)\n";
        return sprintf($format, $this->id, $this->wording);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getWording()
    {
        return $this->wording;
    }

    public function setWording($wording)
    {
        $this->wording = $wording;
    }


    public function getChapter()
    {
        return $this->chapter;
    }

    public function addChapter(Chapter $chapter)
    {
        var_dump($chapter);
        $this->chapter->add($chapter);
        $chapter->setCollection($this);
    }
}
