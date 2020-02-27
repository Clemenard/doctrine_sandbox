<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="learn_tutorial_parts",
 *   uniqueConstraints={
 *       @ORM\UniqueConstraint(name="index_tutorial_unique", columns={"tutorial_id", "indexPart"})
 *   }
 *  )
 */
class TutorialParts
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Tutorial::class, inversedBy="tutorialParts")
     */
    protected $tutorial;

    /**
     * @ORM\Column(name="title", type="string", length=1000, nullable=true, options={"default":"No title"})
     * @var string
     */
    private $title = "No title";
    /**
     * @ORM\Column(name="content", type="string", length=10000, nullable=false, options={"default":"No content"})
     * @var string
     */
    private $content = "no content";
    /**
     * @ORM\Id
     * @ORM\Column(name="indexPart", type="integer", nullable=false, options={"default":0})
     * @var integer
     */
    private $indexPart = 0;


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
