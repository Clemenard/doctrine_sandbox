<?php
# src/Entity/Question.php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="learn_comments")
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity=Tutorial::class, inversedBy="comment")
     */

    protected $tutorial;
    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(name="user", referencedColumnName="id", onDelete="CASCADE")
     * @var User
     */
    protected $user;
    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(name="user_answered", referencedColumnName="id", onDelete="CASCADE")
     * @var User
     */
    private $userAnswered = null;

    /**
     * @ORM\Column(type="text")
     */
    protected $message;
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

    public function getTutorial()
    {
        return $this->tutorial;
    }

    public function setTutorial($tutorial)
    {
        $this->tutorial = $tutorial;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getUserAnswered()
    {
        return $this->userAnswered;
    }

    public function setUserAnswered($userAnswered)
    {
        $this->userAnswered = $userAnswered;
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
