<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="arduino_projects")
 */
class ProjectArduino
{
    const REG_PROJECT_NAME = "/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ]{1}[\w\sáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ'&@-_()]{0,19}[\wáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ)]{0,1}$/";
    const REG_PROJECT_DESCRIPTION = "/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ]{1}[\w\sáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ'&@-_()]{0,999}[\wáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ)]{0,1}$/";

    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(name="user", referencedColumnName="id", onDelete="CASCADE")
     * @var User
     */
    private $user = null;
    /**
     * @ORM\Column(name="project_name", type="string", length=100, nullable=false, options={"default":"Unamed"})
     * @var string
     */
    private $name = "Unamed";
    /**
     * @ORM\Column(name="project_description", type="string", length=1000, nullable=true, options={"default":"No description"})
     * @var string
     */
    private $description = "No description";
    /**
     * @ORM\Column(name="date_updated", type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     * @var \DateTime
     */
    private $dateUpdated;
    /**
     * @ORM\Column(name="code", type="string", length=16777215, nullable=false)
     * @var string
     */
    private $code = "";
    /**
     * @ORM\Column(name="code_mixed",  type="string", length=16777215, nullable=false)
     * @var string
     */
    private $codeMixed = "";
    /**
     * @ORM\Column(name="code_c", type="string", length=16777215, nullable=false)
     * @var string
     */
    private $codeC = "";
    /**
     * @ORM\Column(name="c_manually_modified", type="boolean", nullable=false)
     * @var bool
     */
    private $cManuallyModified = false;
    /**
     * @ORM\Column(name="is_public", type="boolean", nullable=false, options={"default":false})
     * @var bool
     */
    private $public = false;
    /**
     * @ORM\Column(name="link", type="string", length=255, unique=true, nullable=false)
     * @var string
     */
    private $link = null;
    /**
     * @ORM\Column(name="is_deleted", type="boolean", nullable=false, options={"default":false})
     * @var bool
     */
    private $deleted = false;

    /**
     * ProjectArduino constructor
     * @param string $name
     * @param string $description
     */
    public function __construct($name = 'Unamed', $description = 'No description')
    {
        $this->setName($name);
        $this->setDescription($description);
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
        if (is_int($id) && $id > 0) {
            $this->id = $id;
        } else {
            throw new EntityDataIntegrityException("id needs to be integer and positive");
        }
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        if ($user instanceof User || $user == null) {
            $this->user = $user;
        } else {
            throw new EntityDataIntegrityException("user attribute needs to be an instance of User or null");
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        if (preg_match(self::REG_PROJECT_NAME, $this->name)) {
            $this->name = $name;
        } else {
            throw new EntityDataIntegrityException("Error while setting name: name does not match regex.");
        }
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        if (preg_match(self::REG_PROJECT_DESCRIPTION, $description)) {
            $this->description = $description;
        } else {
            throw new EntityDataIntegrityException("description needs to be string and between 1 and 1000 characters");
        }
    }

    /**
     * @return \DateTime
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * @param \DateTime $dateUpdated
     */
    public function setDateUpdated($dateUpdated)
    {
        if ($dateUpdated instanceof \DateTime || $dateUpdated == null) {
            $this->dateUpdated = $dateUpdated;
        } else {
            throw new EntityDataIntegrityException("dateUpdated needs to be DateTime or null");
        }
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        if (is_string($code)) {
            $this->code = $code;
        } else {
            throw new EntityDataIntegrityException("code needs to be string");
        }
    }

    /**
     * @return string
     */
    public function getCodeMixed()
    {
        return $this->codeMixed;
    }

    /**
     * @param string $code_mixed
     */
    public function setCodeMixed($codeMixed)
    {
        if (is_string($codeMixed)) {
            $this->codeMixed = $codeMixed;
        } else {
            throw new EntityDataIntegrityException("codeMixed needs to be string");
        }
    }

    /**
     * @return string
     */
    public function getCodeC()
    {
        return $this->codeC;
    }

    /**
     * @param string $code_c
     */
    public function setCodeC($codeC)
    {
        if (is_string($codeC)) {
            $this->codeC = $codeC;
        } else {
            throw new EntityDataIntegrityException("codeC needs to be string");
        }
    }

    /**
     * @return bool
     */
    public function isCManuallyModified()
    {
        return $this->cManuallyModified;
    }

    /**
     * @param bool $cManuallyModified
     */
    public function setCManuallyModified($cManuallyModified)
    {
        if ($cManuallyModified === null) {
            throw new EntityDataIntegrityException("cManuallyModified attribute should not be null");
        }
        $cManuallyModified = filter_var($cManuallyModified, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        if (is_bool($cManuallyModified)) {
            $this->cManuallyModified = $cManuallyModified;
        } else {
            throw new EntityDataIntegrityException("cManuallyModified needs to be a boolean");
        }
    }
    /**
     * @return bool
     */
    public function isPublic()
    {
        return $this->public;
    }

    /**
     * @param bool $isPublic
     */
    public function setPublic($isPublic)
    {
        if ($isPublic === null) {
            throw new EntityDataIntegrityException("isPublic attribute should not be null");
        }
        $isPublic = filter_var($isPublic, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        if (is_bool($isPublic)) {
            $this->public = $isPublic;
        } else {
            throw new EntityDataIntegrityException("isPublic needs to be boolean");
        }
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        if ($link === null) {
            throw new EntityDataIntegrityException("link attribute should not be null");
        }
        if (is_string($link)) {
            $this->link = $link;
        } else {
            throw new EntityDataIntegrityException("link needs to be string");
        }
    }

    /**
     * isDeleted
     *
     * @return bool
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param  bool $deleted
     */
    public function setDeleted($deleted)
    {
        if ($deleted === null) {
            throw new EntityDataIntegrityException("deleted attribute should not be null");
        }
        $deleted = filter_var($deleted, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        if (is_bool($deleted)) {
            $this->deleted = $deleted;
        } else {
            throw new EntityDataIntegrityException("deleted needs to be boolean");
        }
    }

    public function copy($objectToCopyFrom)
    {
        if ($objectToCopyFrom instanceof self) {
            $this->setName($this->decodeURIComponent($objectToCopyFrom->getName()));
            $this->setDescription($this->decodeURIComponent($objectToCopyFrom->getDescription()));
            $this->setDateUpdated($objectToCopyFrom->getDateUpdated());
            $this->setCode($objectToCopyFrom->getCode());
            $this->setCodeMixed($objectToCopyFrom->getCodeMixed());
            $this->setCodeC($objectToCopyFrom->getCodeC());
            $this->setCManuallyModified($objectToCopyFrom->isCManuallyModified());
            $this->setPublic($objectToCopyFrom->isPublic());
            $this->setDeleted($objectToCopyFrom->isDeleted());
        } else {
            throw new EntityOperatorException("ObjectToCopyFrom attribute needs to be an instance of ProjectArduino");
        }
    }

    private function decodeURIComponent($str)
    {
        $revert = array('!' => '%21', '*' => '%2A', "'" => '%27', '(' => '%28', ')' => '%29');
        $str = strtr($str, $revert);
        return rawurldecode($str);
    }

    private function encodeURIComponent($str)
    {
        $revert = array('%21' => '!', '%2A' => '*', '%27' => "'", '%28' => '(', '%29' => ')');
        return strtr(rawurlencode($str), $revert);
    }

    public function jsonSerialize()
    {
        return [
            'user' => $this->getUser(),
            'name' => $this->encodeURIComponent($this->getName()),
            'description' => $this->encodeURIComponent($this->getDescription()),
            'dateUpdated' => $this->getDateUpdated(),
            'code' => $this->getCode(),
            'codeMixed' => $this->getCodeMixed(),
            'codeC' => $this->getCodeC(),
            'cManuallyModified' => $this->isCManuallyModified(),
            'public' => $this->isPublic(),
            'link' => $this->getLink()
        ];
    }
}
