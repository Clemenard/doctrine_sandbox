<?php
# src/Entity/Question.php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="tutorial")
 */
class Tutorial
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\OneToMany(targetEntity=Favorite::class, mappedBy="tutorial_id")
     */

    protected $favorite;
    /**
     * @ORM\OneToMany(targetEntity=Lesson::class, mappedBy="tutorial_id")
     */
    protected $lesson;
    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(name="user", referencedColumnName="id", onDelete="CASCADE")
     * @var User
     */
    private $user = null;

    /**
     * @ORM\OneToMany(targetEntity=TutorialParts::class, cascade={"persist", "remove"}, mappedBy="tutorial")
     */
    protected $part;

    /**
     * @ORM\Column(type="text")
     */
    protected $wording;
    public function __construct()
    {
        $this->part = new ArrayCollection();
    }
    public function __toString()
    {
        $format = "Tutorial (id: %s, user: %s, wording: %s, part: %s)\n";
        return sprintf($format, $this->id, $this->user, $this->wording, $this->part);
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

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getPart()
    {
        return $this->part;
    }

    public function addPart(TutorialParts $part)
    {
        $this->part->add($part);
        $part->setTutorial($this);
    }
}
