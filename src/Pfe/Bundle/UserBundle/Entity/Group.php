<?php

namespace Pfe\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Group
 *
 * @ORM\Table(name="pfe_group")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\UserBundle\Entity\Repository\GroupRepository")
 */
class Group
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=40)
     */
    private $nom;

    /**
     * @var text
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

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
     * @var object Student
     *
     * @ORM\Column(name="student_id")
     * @ORM\ManyToOne(targetEntity="Pfe\Bundle\UserBundle\Entity\Student", cascade={"persist"})
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
     * Set nom
     *
     * @param string $nom
     * @return Group
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
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
}
