<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="chapter",
 *   uniqueConstraints={
 *       @ORM\UniqueConstraint(name="collection_wording_unique", columns={"collection_id", "wording"})
 *   }
 *  )
 */
class Chapter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity=Collection::class, inversedBy="chapter")
     */
    protected $collection;
    /**
     * @ORM\OneToMany(targetEntity=Lesson::class, mappedBy="chapter_id")
     */
    protected $lesson;
    /**
     * @ORM\Column(type="string")
     */
    protected $wording;


    public function __toString()
    {
        $format = "Chapter (id: %s, collection: %s, lesson: %s, wording: %s)\n";
        return sprintf($format, $this->id, $this->collection, $this->lesson, $this->wording);
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getCollection()
    {
        return $this->collection;
    }

    public function setCollection($collection)
    {
        $this->collection = $collection;
    }

    public function getWording()
    {
        return $this->wording;
    }

    public function setWording($wording)
    {
        $this->wording = $wording;
    }
}
