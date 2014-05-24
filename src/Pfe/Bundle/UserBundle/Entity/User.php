<?php

namespace Pfe\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(name="cin", type="integer", length=8, nullable=true)
     * @Assert\NotBlank()
     */
    protected $cin;


    /**
     * @var date
     *
     * @ORM\Column(name="dateofbirth", type="date",  nullable=true)
     */
    protected $dateofbirth;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text",length=255,  nullable=true)
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", nullable=true)
     * @Assert\NotBlank()
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=100, nullable=true)
     * @Assert\NotBlank()
     */
    protected $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=100, nullable=true)
     * @Assert\NotBlank()
     */
    protected $adresse;


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
     * @Assert\NotBlank()
     */
    protected $phone;

    /**
     * @var date
     *
     * @ORM\Column(name="registrationdate", type="date",  nullable=true)
     */
    protected $registrationdate;

    /**
     * @var object User
     *
     * @ORM\OneToOne(targetEntity="Pfe\Bundle\UserBundle\Entity\Student", mappedBy="user", cascade={"persist"})
     *
     */
    protected $student;

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
     * Set dateofbirth
     *
     * @param \DateTime $dateofbirth
     * @return User
     */
    public function setDateofbirth($dateofbirth)
    {
        $this->dateofbirth = $dateofbirth;
    
        return $this;
    }

    /**
     * Get dateofbirth
     *
     * @return \DateTime 
     */
    public function getDateofbirth()
    {
        return $this->dateofbirth;
    }

    /**
     * Set registrationdate
     *
     * @param \DateTime $registrationdate
     * @return User
     */
    public function setRegistrationdate($registrationdate)
    {
        $this->registrationdate = $registrationdate;
    
        return $this;
    }

    /**
     * Get registrationdate
     *
     * @return \DateTime 
     */
    public function getRegistrationdate()
    {
        return $this->registrationdate;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return User
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    public function __toString()
    {
        return $this->getCin();
    }


    /**
     * Set student
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Student $student
     * @return User
     */
    public function setStudent(\Pfe\Bundle\UserBundle\Entity\Student $student = null)
    {
        $this->student = $student;
    
        return $this;
    }

    /**
     * Get student
     *
     * @return \Pfe\Bundle\UserBundle\Entity\Student 
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set teacher
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Teacher $teacher
     * @return User
     */
    public function setTeacher(\Pfe\Bundle\UserBundle\Entity\Teacher $teacher = null)
    {
        $this->teacher = $teacher;
    
        return $this;
    }

    /**
     * Get teacher
     *
     * @return \Pfe\Bundle\UserBundle\Entity\Teacher 
     */
    public function getTeacher()
    {
        return $this->teacher;
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
}