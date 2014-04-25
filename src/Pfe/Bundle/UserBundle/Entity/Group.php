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
     * @ORM\ManyToOne(targetEntity="Pfe\Bundle\UserBundle\Entity\Student", inversedBy="group")
     */
    protected $student;

    public function __construct()
    {

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

    /**
     * Set description
     *
     * @param string $description
     * @return Group
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

    /**
     * Set date_creation
     *
     * @param \DateTime $dateCreation
     * @return Group
     */
    public function setDateCreation($dateCreation)
    {
        $this->date_creation = $dateCreation;
    
        return $this;
    }

    /**
     * Get date_creation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * Set date_modification
     *
     * @param \DateTime $dateModification
     * @return Group
     */
    public function setDateModification($dateModification)
    {
        $this->date_modification = $dateModification;
    
        return $this;
    }

    /**
     * Get date_modification
     *
     * @return \DateTime 
     */
    public function getDateModification()
    {
        return $this->date_modification;
    }

    /**
     * Add courses
     *
     * @param \Pfe\Bundle\CoursesBundle\Entity\Courses $courses
     * @return Group
     */
    public function addCourse(\Pfe\Bundle\CoursesBundle\Entity\Courses $courses)
    {
        $this->courses[] = $courses;
    
        return $this;
    }

    /**
     * Remove courses
     *
     * @param \Pfe\Bundle\CoursesBundle\Entity\Courses $courses
     */
    public function removeCourse(\Pfe\Bundle\CoursesBundle\Entity\Courses $courses)
    {
        $this->courses->removeElement($courses);
    }

    /**
     * Get courses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * Add student
     *
     * @param \Pfe\Bundle\CoursesBundle\Entity\Student $student
     * @return Group
     */
    public function addStudent(\Pfe\Bundle\CoursesBundle\Entity\Student $student)
    {
        $this->student[] = $student;
    
        return $this;
    }

    /**
     * Remove student
     *
     * @param \Pfe\Bundle\CoursesBundle\Entity\Student $student
     */
    public function removeStudent(\Pfe\Bundle\CoursesBundle\Entity\Student $student)
    {
        $this->student->removeElement($student);
    }

    /**
     * Get student
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set student
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Student $student
     * @return Group
     */
    public function setStudent(\Pfe\Bundle\UserBundle\Entity\Student $student = null)
    {
        $this->student = $student;
    
        return $this;
    }
    public function __toString()
    {
        return $this->getNom();
    }
}