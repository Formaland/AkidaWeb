<?php

namespace Pfe\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Pfe\Bundle\UserBundle\Entity\User as BaseUser;

/**
 * Teacher
 *
 * @ORM\Table(name="pfe_teacher")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\UserBundle\Entity\Repository\TeacherRepository")
 */
class Teacher
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
     * @ORM\Column(name="diplome", type="string", length=80, nullable=true)
     */
    protected $diplome;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string",length=255,  nullable=true)
     */
    protected $description;

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
     * Set diplome
     *
     * @param string $diplome
     * @return User
     */
    public function setDiplome($diplome)
    {
        $this->diplome = $diplome;

        return $this;
    }

    /**
     * Get diplome
     *
     * @return string
     */
    public function getDiplome()
    {
        return $this->diplome;
    }



    /**
     * Set description
     *
     * @param string $description
     * @return Teacher
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
        return $this->getDescription();
    }

}