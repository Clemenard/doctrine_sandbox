<?php
# src/Entity/Participation.php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="favorite",
 *   uniqueConstraints={
 *       @ORM\UniqueConstraint(name="user_tutorial_unique", columns={"user_id", "tutorial_id"})
 *   }
 *  )
 */
class Favorite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="favorite")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity=Tutorial::class, inversedBy="favorite")
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

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
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
