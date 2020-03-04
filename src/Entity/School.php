<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="data_schools")
 */
class School
{

    /** 
     * @ORM\Id
     * @ORM\Column(name="school_id",type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\Column(name="school_name", type="string",length=255, nullable=true)
     * @var string
     */
    private $name;
    /**
     * @ORM\Column(name="school_type", type="string",length=255, nullable=true)
     * @var string
     */
    private $type;
    /**
     * @ORM\Column(name="school_status", type="string",length=255, nullable=true)
     * @var string
     */
    private $status;
    /**
     * @ORM\Column(name="school_adress1", type="string",length=255, nullable=true)
     * @var string
     */
    private $adress1;
    /**
     * @ORM\Column(name="school_adress2", type="string",length=255, nullable=true)
     * @var string
     */
    private $adress2;
    /**
     * @ORM\Column(name="school_adress3", type="string",length=255, nullable=true)
     * @var string
     */
    private $adress3;
    /**
     * @ORM\Column(name="school_zip_code", type="string",length=255, nullable=true)
     * @var string
     */
    private $zipCode;
    /**
     * @ORM\Column(name="school_town_code", type="string",length=255, nullable=true)
     * @var string
     */
    private $townCode;
    /**
     * @ORM\Column(name="school_town_name", type="string",length=255, nullable=true)
     * @var string
     */
    private $townName;
    /**
     * @ORM\Column(name="school_state_code", type="string",length=255, nullable=true)
     * @var string
     */
    private $stateCode;
    /**
     * @ORM\Column(name="school_academy_code", type="string",length=255, nullable=true)
     * @var string
     */
    private $academyCode;
    /**
     * @ORM\Column(name="school_region_code", type="string",length=255, nullable=true)
     * @var string
     */
    private $regionCode;
    /**
     * @ORM\Column(name="school_is_maternelle", type="string",length=255, nullable=true)
     * @var string
     */
    private $isMaternelle;
    /**
     * @ORM\Column(name="school_is_elementaire", type="string",length=255, nullable=true)
     * @var string
     */
    private $isElementaire;
    /**
     * @ORM\Column(name="school_is_generale", type="string",length=255, nullable=true)
     * @var string
     */
    private $isGenerale;
    /**
     * @ORM\Column(name="school_is_technologique", type="string",length=255, nullable=true)
     * @var string
     */
    private $isTechnologique;
    /**
     * @ORM\Column(name="school_is_professionelle", type="string",length=255, nullable=true)
     * @var string
     */
    private $isProfessionelle;
    /**
     * @ORM\Column(name="school_telephone", type="string",length=255, nullable=true)
     * @var string
     */
    private $telephone;
    /**
     * @ORM\Column(name="school_fax", type="string",length=255, nullable=true)
     * @var string
     */
    private $fax;
    /**
     * @ORM\Column(name="school_website", type="string",length=255, nullable=true)
     * @var string
     */
    private $website;
    /**
     * @ORM\Column(name="school_mail", type="string",length=255, nullable=true)
     * @var string
     */
    private $mail;
    /**
     * @ORM\Column(name="school_restauration", type="string",length=255, nullable=true)
     * @var string
     */
    private $restauration;
    /**
     * @ORM\Column(name="school_accomodation", type="string",length=255, nullable=true)
     * @var string
     */
    private $accomodation;
    /**
     * @ORM\Column(name="school_ULIS", type="string",length=255, nullable=true)
     * @var string
     */
    private $ulis;
    /**
     * @ORM\Column(name="school_apprenticeship", type="string",length=255, nullable=true)
     * @var string
     */
    private $apprenticeship;
    /**
     * @ORM\Column(name="school_is_segpa", type="string",length=255, nullable=true)
     * @var string
     */
    private $isSegpa;
    /**
     * @ORM\Column(name="school_art_section", type="string",length=255, nullable=true)
     * @var string
     */
    private $artSection;
    /**
     * @ORM\Column(name="school_theater_section", type="string",length=255, nullable=true)
     * @var string
     */
    private $theaterSection;
    /**
     * @ORM\Column(name="school_sport_section", type="string",length=255, nullable=true)
     * @var string
     */
    private $sportSection;
    /**
     * @ORM\Column(name="school_international_section", type="string",length=255, nullable=true)
     * @var string
     */
    private $internationalSection;
    /**
     * @ORM\Column(name="school_euro_section", type="string",length=255, nullable=true)
     * @var string
     */
    private $euroSection;

    /**
     * @ORM\Column(name="school_agricultural_section", type="string",length=255, nullable=true)
     * @var string
     */
    private $agriculturalSection;

    /**
     * @ORM\Column(name="school_military_section", type="string",length=255, nullable=true)
     * @var string
     */
    private $militarySection;

    /**
     * @ORM\Column(name="school_jobs_section", type="string",length=255, nullable=true)
     * @var string
     */
    private $jobsSection;

    /**
     * @ORM\Column(name="school_after_bac", type="string",length=255, nullable=true)
     * @var string
     */
    private $afterBac;

    /**
     * @ORM\Column(name="school_belongs_to", type="string",length=255, nullable=true)
     * @var string
     */
    private $belongsTo;

    /**
     * @ORM\Column(name="school_GRETA", type="string",length=255, nullable=true)
     * @var string
     */
    private $greta;

    /**
     * @ORM\Column(name="school_siret_number", type="string",length=255, nullable=true)
     * @var string
     */
    private $siretNumber;

    /**
     * @ORM\Column(name="school_student_amount", type="string",length=255, nullable=true)
     * @var string
     */
    private $studentAmount;

    /**
     * @ORM\Column(name="school_onisep", type="string",length=255, nullable=true)
     * @var string
     */
    private $onisep;

    /**
     * @ORM\Column(name="school_longitude", type="float", nullable=true)
     * @var float
     */
    private $longitude;

    /**
     * @ORM\Column(name="school_latitude", type="float", nullable=true)
     * @var float
     */
    private $latitude;

    public function __construct()
    {
    }
}
