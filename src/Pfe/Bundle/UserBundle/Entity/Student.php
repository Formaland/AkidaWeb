<?php

namespace Pfe\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table(name="pfe_student")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\UserBundle\Entity\Repository\StudentRepository")
 */
class Student extends User
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
     */
    protected $mere;

    /**
     * @var string
     *
     * @ORM\Column(name="pere", type="string", length=30, nullable=true)
     */
    protected $pere;

    /**
     * @var string
     *
     * @ORM\Column(name="ecole", type="string", length=30, nullable=true)
     */
    protected $ecole;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau_scolaire", type="string", length=30, nullable=true)
     */
    protected $niveau_scolaire;

    /**
     * @var object User
     *
     * @ORM\Column(name="user_id")
     * @ORM\OneToOne(targetEntity="Pfe\Bundle\UserBundle\Entity\User", cascade={"persist"})
     */
    protected $user;


    public function __construct(){


    }


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
     * @param object $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return object
     */
    public function getUser()
    {
        return $this->user;
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
     * Set niveau_scolaire
     *
     * @param string $niveau_scolaire
     * @return User
     */
    public function setNiveau_scolaire($niveau_scolaire)
    {
        $this->niveau_scolaire = $niveau_scolaire;

        return $this;
    }

    /**
     * Get niveau_scolaire
     *
     * @return string
     */
    public function getNiveau_scolaire()
    {
        return $this->niveau_scolaire;
    }



}
