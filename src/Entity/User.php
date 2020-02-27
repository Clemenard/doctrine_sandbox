<?php
# src/Entity/User.php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity=Favorite::class, mappedBy="user_id")
     */
    protected $favorite;

    /** 
     * @ORM\Column(name="user_firstname", type="string", length=255, nullable=false)
     * @var string
     */
    private $firstname;
    /**
     * @ORM\Column(name="user_surname", type="string", length=255, nullable=false)
     * @var string
     */
    private $surname;
    /**
     * @ORM\Column(name="user_email", type="string", length=255, unique=true, nullable=false)
     * @var string
     */
    private $email;
    /**
     * @ORM\Column(name="user_bio", type="string", length=1000, nullable=true)
     * @var string
     */
    private $bio = NULL;
    /**
     * @ORM\Column(name="user_telephone", type="string", length=255, nullable=true)
     * @var string
     */
    private $telephone;
    /**
     * @ORM\Column(name="user_password", type="string", length=250, nullable=false)
     * @var string
     */
    private $password;
    /**
     * @ORM\Column(name="user_picture", type="string", length=250, nullable=true)
     * @var string
     */
    private $picture = NULL;
    /**
     * @ORM\Column(name="user_is_deleted", type="boolean")
     * @var bool
     */
    private $deleted = false;
    /**
     * @ORM\Column(name="user_insert_date", type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     * @var \DateTime
     */
    private $insertDate;
    /**
     * @ORM\Column(name="user_update_date", type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     * @var \DateTime
     */
    private $updateDate;
    /**
     * @ORM\Column(name="confirm_token", type="string", length=250, nullable=true)
     * @var string
     */
    private $confirmToken = null;
    /**
     * @ORM\Column(name="private_flag", type="boolean")
     * @var bool
     */
    private $privateFlag = false;
    /**
     * @ORM\Column(name="contact_flag", type="boolean")
     * @var bool
     */
    private $contactFlag = false;
    /**
     * @ORM\Column(name="newsletter", type="boolean")
     * @var bool
     */
    private $newsletter = false;
    /**
     * @ORM\Column(name="mail_messages", type="boolean")
     * @var bool
     */
    private $mailMessages = false;
    /**
     * @ORM\Column(name="is_active", type="boolean")
     * @var bool
     */
    private $active = false;
    /**
     * @ORM\Column(name="recovery_token", type="string", length=255, nullable=true)
     * @var string
     */
    private $recoveryToken = null;
    /**
     * @ORM\Column(name="new_mail", type="string", length=1000, nullable=true)
     * @var string
     */
    private $newMail = null;
    /**
     * @ORM\Column(name="is_admin", type="boolean")
     * @var string
     */
    private $isAdmin = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function __toString()
    {
        $format = "User (id: %s, firstname: %s, lastname: %s, role: %s)\n";
        return sprintf($format, $this->id, $this->firstname, $this->lastname, $this->role);
    }
}
