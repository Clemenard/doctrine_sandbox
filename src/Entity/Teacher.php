<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="user_teachers")
 */
class Teacher
{

    /** 
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(name="teacher_user", referencedColumnName="id", onDelete="CASCADE")
     * @var User
     */
    private $user;
    /**
     * @ORM\Column(name="teacher_subject", type="integer", length=3, nullable=false)
     * @var integer
     */
    private $subject;
    /**
     * @ORM\ManyToOne(targetEntity=School::class)
     * @ORM\JoinColumn(name="teacher_school", referencedColumnName="school_id", onDelete="CASCADE")
     */
    private $school;
    /**
     * @ORM\Column(name="teacher_grade", type="integer", length=3, nullable=false)
     * @var integer
     */
    private $grade;

    public function __construct($user = "", $subject = 0, $school = '', $grade = 0)
    {
        $this->setUser($user);
        $this->setSubject($subject);
        $this->setSchool($school);
        $this->setGrade($grade);
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @param User $id
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
    /**
     * @return integer
     */
    public function getSubject()
    {
        return $this->subject;
    }
    /**
     * @param int $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }
    /**
     * @return string
     */
    public function getSchool()
    {
        return $this->school;
    }
    /**
     * @param string $school
     */
    public function setSchool($school)
    {
        $this->school = $school;
    }
    /**
     * @return integer
     */
    public function getGrade()
    {
        return $this->grade;
    }
    /**
     * @param int $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    public function jsonSerialize()
    {
        return [
            'grade' => $this->getGrade(),
            'user' => $this->getUser(),
            'school' => $this->getSchool(),
            'subject' => $this->getSubject()
        ];
    }

    public static function jsonDeserialize($jsonDecoded)
    {
        $classInstance = new self();
        foreach ($jsonDecoded as $attributeName => $attributeValue) {
            $classInstance->{$attributeName} = $attributeValue;
        }
        return $classInstance;
    }
}
