<?php

namespace Pfe\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="pfe_user")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\UserBundle\Entity\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=8, nullable=true)
     */
    protected $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=100, nullable=true)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=100, nullable=true)
     */
    protected $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=100, nullable=true)
     */
    protected $adresse;


    /**
     * @var datetime
     *
     * @ORM\Column(name="date_creation", type="datetime", length=40)
     */
    private $date_creation;

    /**
     * @var DATETIME
     *
     * @ORM\Column(name="date_modification", type="datetime", length=40)
     */
    private $date_modification;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255, nullable=true)
     */
    protected $token;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=100, nullable=true)
     */
    protected $phone;

    /**
     * @var object User
     *
     * @ORM\Column(name="student_id")
     * @ORM\OneToOne(targetEntity="Pfe\Bundle\UserBundle\Entity\Student", cascade={"persist"})
     *
    protected $student;
    */
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return User
     */
    public function setToken($token)
    {
        $this->token = $token;
    
        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * Set adresse
     *
     * @param string $adresse
     * @return User
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }
    /**
     * Set cin
     *
     * @param string $cin
     * @return User
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return string
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set date_creation
     *
     * @param string $date_creation
     * @return User
     */
    public function setDate_creation($date_creation)
    {
        $this->date_creation= $date_creation;

        return $this;
    }

    /**
     * Get date_creation
     *
     * @return datetime
     */
    public function getDate_creation()
    {
        return $this->date_creation;
    }

    /**
     * Set date_modification
     *
     * @param string $date_modification
     * @return User
     */
    public function setDate_modification($date_modification)
    {
        $this->date_modification= $date_modification;

        return $this;
    }

    /**
     * Get date_modification
     *
     * @return datetime
     */
    public function getDate_modification()
    {
        return $this->date_modification;
    }
}
