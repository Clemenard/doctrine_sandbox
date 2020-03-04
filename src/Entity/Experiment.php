<?php

namespace Tuto\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="vittamap_experiments")
 */
class Experiment
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\Column(name="exp_name", type="string", length=255, nullable=false)
     * @var string
     */
    private $name;
    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(name="exp_user", referencedColumnName="id", onDelete="CASCADE")
     * @var User
     */
    private $user;
    /**
     * @ORM\Column(name="exp_type", type="integer", length=11, nullable=false)
     * @var integer
     */
    private $type;
    /**
     * @ORM\Column(name="exp_longitude", type="float", nullable=false)
     * @var float
     */
    private $longitude;
    /**
     * @ORM\Column(name="exp_latitude", type="float", nullable=false)
     * @var float
     */
    private $latitude;
    /**
     * @ORM\Column(name="exp_begin_date", type="string", length=20, nullable=true)
     * @var string
     */
    private $beginDate;
    /**
     * @ORM\Column(name="exp_end_date", type="string", length=20, nullable=true)
     * @var string
     */
    private $endDate;
    /**
     * @ORM\Column(name="exp_insert_date", type="string", length=20, nullable=false)
     * @var string
     */
    private $insertDate;
    /**
     * @ORM\Column(name="exp_is_deleted", type="boolean", nullable=false)
     * @var bool
     */
    private $isDeleted;
    /**
     * @ORM\Column(name="exp_description", type="text", nullable=false)
     * @var string
     */
    private $description;
    /**
     * @ORM\Column(name="exp_anecdote", type="text", nullable=true)
     * @var string
     */
    private $anecdote;
    /**
     * @ORM\Column(name="exp_advice", type="text", nullable=true)
     * @var string
     */
    private $advice;
    /**
     * @ORM\Column(name="exp_lang", type="string", length=2, nullable=false)
     * @var string
     */
    private $lang;
    /**
     * @ORM\Column(name="location", type="string", nullable=false)
     * @var string
     */
    private $location;
    /**
     * @ORM\ManyToOne(targetEntity=School::class)
     * @ORM\JoinColumn(name="school_id", referencedColumnName="school_id", onDelete="CASCADE")
     * @var School
     */
    private $school;

    const MAX_NAME_SIZE = 50;
    const MIN_NAME_SIZE = 1;
    const MINIMUM_YEAR = 2016;
    const CLASS_MIN_LENGTH = 1;
    const CLASS_MAX_LENGTH = 30;
    const MIN_DESCRIPTION_SIZE = 1;
    const MAX_DESCRIPTION_SIZE = 1000;
    const MIN_ANECTODE_SIZE = 0;
    const MAX_ANECTODE_SIZE = 1000;
    const MIN_ADVICE_SIZE = 0;
    const MAX_ADVICE_SIZE = 1000;

    const MAX_PICTURE_SIZE = 10000000;
    const MAX_VIDEO_SIZE = 100000000000000;

    public function __construct(
        $id,
        $name,
        $user,
        $type,
        $longitude,
        $latitude,
        $beginDate,
        $endDate,
        $insertDate,
        $isDeleted,
        $description,
        $anecdote,
        $advice,
        $lang,
        $location,
        $school
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->user = $user;
        $this->type = $type;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
        $this->beginDate = $beginDate;
        $this->endDate = $endDate;
        $this->insertDate = $insertDate;
        $this->isDeleted = $isDeleted;
        $this->description = $description;
        $this->anecdote = $anecdote;
        $this->advice = $advice;
        $this->lang = $lang;
        $this->location = $location;
        $this->school = $school;
    }
    //getters et setters.
    /**
     * @param int $id
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param string $name
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param User $user
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @param int $type
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @param float $longitude
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
    /**
     * @param float $latitude
     */
    public function getLatitude()
    {
        return $this->latitude;
    }
    /**
     * @param string $beginDate
     */
    public function getBeginDate()
    {
        return $this->beginDate;
    }
    /**
     * @param string $endDate
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
    /**
     * @param string $insertDate
     */
    public function getInsertDate()
    {
        return $this->insertDate;
    }
    /**
     * @param string $lang
     */
    public function getLang()
    {
        return $this->lang;
    }
    /**
     * @param bool $isDeleted
     */
    public function isDeleted()
    {
        return $this->insertDate;
    }
    // ici, on renvoie un tableau associatif contenant description, anecdote et advice.
    /**
     * @param string $description
     * @param string $anecdote
     * @param string $advice
     */
    public function getDescription()
    {
        return ["description" => $this->description, "anecdote" => $this->anecdote, "advice" => $this->advice];
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
    /**
     * @param float $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }
    /**
     * @param float $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }
    /**
     * @param string $beginDate
     */
    public function setBeginDate($beginDate)
    {
        $this->beginDate = $beginDate;
    }
    /**
     * @param string $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }
    /**
     * @param string $insertDate
     */
    public function setInsertDate($insertDate)
    {
        $this->insertDate = $insertDate;
    }
    /**
     * @param bool $isDeleted
     */
    public function delete($isDeleted)
    {
        $this->isDeleted = $isDeleted;
    }
    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    /**
     * @param string $anecdote
     */
    public function setAnectode($anecdote)
    {
        $this->anecdote = $anecdote;
    }
    /**
     * @param string $advice
     */
    public function setAdvice($advice)
    {
        $this->advice = $advice;
    }
    /**
     * @param string $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }
    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }
    /**
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }
    /**
     * @param string $school
     */
    public function setSchool($school)
    {
        $this->school = $school;
    }
    /**
     * @return string
     */
    public function getSchool()
    {
        return $this->school;
    }
    public function jsonSerialize()
    {
        $array = get_object_vars($this);
        return $array;
    }
}
