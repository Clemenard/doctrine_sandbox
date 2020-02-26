<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="part",
 *   uniqueConstraints={
 *       @ORM\UniqueConstraint(name="index_tutorial_unique", columns={"tutorial_id", "wording"})
 *   }
 *  )
 */
class TutorialParts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity=Tutorial::class, inversedBy="tutorialParts")
     */
    protected $tutorial;

    /**
     * @ORM\Column(type="string")
     */
    protected $wording;
    /**
     * @ORM\Column(name="index_order",type="integer")
     */
    protected $indexOrder;


    public function __toString()
    {
        $format = "Part (id: %s, wording: %s)\n";
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
    public function getTutorial()
    {
        return $this->tutorial;
    }

    public function setTutorial($tutorial)
    {
        $this->tutorial = $tutorial;
    }

    public function getWording()
    {
        return $this->wording;
    }

    public function setWording($wording)
    {
        $this->wording = $wording;
    }

    public function getIndexOrder()
    {
        return $this->indexOrder;
    }

    public function setIndexOrder($indexOrder)
    {
        $this->indexOrder = $indexOrder;
    }
}
