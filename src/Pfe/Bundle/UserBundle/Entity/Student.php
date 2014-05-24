<?php

namespace Pfe\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Student
 *
 * @ORM\Table(name="pfe_student")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\UserBundle\Entity\Repository\StudentRepository")
 */
class Student
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @var string
     *
     * @ORM\Column(name="mere", type="string", length=30, nullable=true)
     * @Assert\NotBlank()
     */
    protected $mere;

    /**
     * @var string
     *
     * @ORM\Column(name="pere", type="string", length=30, nullable=true)
     * @Assert\NotBlank()
     */
    protected $pere;

    /**
     * @var string
     *
     * @ORM\Column(name="ecole", type="string", length=80, nullable=true)
     * @Assert\NotBlank()
     */
    protected $ecole;

    /**
     * @var string
     *
     * @ORM\Column(name="niveauscolaire", type="string", length=80, nullable=true)
     * @Assert\NotBlank()
     */
    protected $niveauscolaire;



    /**
     *
     * @ORM\ManyToOne(targetEntity="Pfe\Bundle\UserBundle\Entity\Group", inversedBy="students")
     *@ORM\JoinColumn(nullable=false)
     */
    protected $group;

    /**
     * @var object Examen
     *
     * @ORM\JoinColumn(name="examen_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\ExamenBundle\Entity\Examen", mappedBy="examen",  cascade={"persist"})
     */
    protected $examen;

    /**
     * @var object Oraltest
     *
     * @ORM\JoinColumn(name="oraltest_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\HoralTestBundle\Entity\Oraltest", mappedBy="Oraltest",  cascade={"persist"})
     */
    protected $oraltest;

    /**
     * @var object User
     *

     * @ORM\OneToOne(targetEntity="Pfe\Bundle\UserBundle\Entity\User", cascade={"persist"})
     */
    protected $user;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pere
     *
     * @param string $pere
     * @return User
     */
    public function setPere($pere)
    {
        $this->pere = $pere;

        return $this;
    }

    /**
     * Get pere
     *
     * @return string
     */
    public function getPere()
    {
        return $this->pere;
    }
    /**
     * Set mere
     *
     * @param string $mere
     * @return User
     */
    public function setMere($mere)
    {
        $this->mere = $mere;

        return $this;
    }

    /**
     * Get mere
     *
     * @return string
     */
    public function getMere()
    {
        return $this->mere;
    }

    /**
     * Set ecole
     *
     * @param string $ecole
     * @return User
     */
    public function setEcole($ecole)
    {
        $this->ecole = $ecole;

        return $this;
    }

    /**
     * Get ecole
     *
     * @return string
     */
    public function getEcole()
    {
        return $this->ecole;
    }

    /**
     * Set niveauscolaire
     *
     * @param string $niveauscolaire
     * @return User
     */
    public function setNiveauscolaire($niveauscolaire)
    {
        $this->niveauscolaire = $niveauscolaire;

        return $this;
    }

    /**
     * Get niveauscolaire
     *
     * @return string
     */
    public function getNiveauscolaire()
    {
        return $this->niveauscolaire;
    }



    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * Set group
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Group $group
     * @return Student
     */
    public function setGroup(\Pfe\Bundle\UserBundle\Entity\Group $group)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return \Pfe\Bundle\UserBundle\Entity\Group 
     */
    public function getGroup()
    {
        return $this->group;

    }


    public function __toString()
    {
        return $this->getMere();
    }

    /**
     * Add examen
     *
     * @param \Pfe\Bundle\ExamenBundle\Entity\Examen $examen
     * @return Student
     */
    public function addExamen(\Pfe\Bundle\ExamenBundle\Entity\Examen $examen)
    {
        $this->examen[] = $examen;
    
        return $this;
    }

    /**
     * Remove examen
     *
     * @param \Pfe\Bundle\ExamenBundle\Entity\Examen $examen
     */
    public function removeExamen(\Pfe\Bundle\ExamenBundle\Entity\Examen $examen)
    {
        $this->examen->removeElement($examen);
    }

    /**
     * Get examen
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExamen()
    {
        return $this->examen;
    }

    /**
     * Add oraltest
     *
     * @param \Pfe\Bundle\HoralTestBundle\Entity\Oraltest $oraltest
     * @return Student
     */
    public function addOraltest(\Pfe\Bundle\HoralTestBundle\Entity\Oraltest $oraltest)
    {
        $this->oraltest[] = $oraltest;
    
        return $this;
    }

    /**
     * Remove oraltest
     *
     * @param \Pfe\Bundle\HoralTestBundle\Entity\Oraltest $oraltest
     */
    public function removeOraltest(\Pfe\Bundle\HoralTestBundle\Entity\Oraltest $oraltest)
    {
        $this->oraltest->removeElement($oraltest);
    }

    /**
     * Get oraltest
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOraltest()
    {
        return $this->oraltest;
    }

    /**
     * Set user
     *
     * @param \Pfe\Bundle\UserBundle\Entity\User $user
     * @return Student
     */
    public function setUser(\Pfe\Bundle\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Pfe\Bundle\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}