<?php
# src/Entity/Question.php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="learn_tutorials")
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
     * @ORM\ManyToOne(targetEntity="Users/Entity/User")
     * @ORM\JoinColumn(name="user", referencedColumnName="id", onDelete="CASCADE")
     * @var User
     */
    private $user = null;

    /**
     * @ORM\OneToMany(targetEntity=TutorialParts::class, cascade={"persist", "remove"}, mappedBy="tutorial")
     */
    protected $part;

    /**
     * @ORM\Column(name="title", type="string", length=1000, nullable=false, options={"default":"No title"})
     * @var string
     */
    private $title = "No title";
    /**
     * @ORM\Column(name="description", type="string", length=1000, nullable=false, options={"default":"No description"})
     * @var string
     */
    private $description = "No description";
    /**
     * @ORM\Column(name="duration", type="integer", options={"default":3600})
     * @var integer
     */
    private $duration = 3600; // in seconds
    /**
     * @ORM\Column(name="difficulty", type="integer", nullable=false, options={"default":0})
     * @var integer
     * difficulty is between 0 and 3
     */
    private $difficulty = 0;
    /**
     * @ORM\Column(name="lang", type="string", length=100, nullable=true, options={"default":"No lang"})
     * @var string
     */
    private $lang = "No lang";
    /**
     * @ORM\Column(name="support", type="integer", nullable=false)
     * @var integer
     */
    private $support;
    /**
     * @ORM\Column(name="img", type="string", length=10000, nullable=false, options={"default":"No image"})
     * @var string
     */
    private $img = "No image";
    /**
     * @ORM\Column(name="link", type="string", nullable=false, options={"default":"No link"})
     * @var string
     */
    private $link = "no link";
    /**
     * @ORM\Column(name="created_at", type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     * @var \DateTime
     */
    private $createdAt;
    /**
     * @ORM\Column(name="updated_at", type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     * @var \DateTime
     */
    private $updatedAt;
    /**
     * @ORM\Column(name="is_deleted", type="boolean", nullable=false, options={"default":false})
     * @var bool
     */
    private $deleted = false;

    /**
     * @ORM\Column(name="is_microbit", type="boolean", nullable=false, options={"default":false})
     * @var bool
     */
    private $isMicrobit = false;

    /**
     * @ORM\Column(name="rights", type="integer", nullable=false, options={"default":0})
     * @var integer
     * values are between 0 and 2
     */
    private $rights = 0;
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
