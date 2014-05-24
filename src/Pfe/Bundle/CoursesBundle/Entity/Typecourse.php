<?php

namespace Pfe\Bundle\CoursesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typecourse
 *
 * @ORM\Table(name="pfe_typecourse")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\CoursesBundle\Entity\Repository\TypecourseRepository")
 */
class Typecourse
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
     * @ORM\OneToMany(targetEntity="Pfe\Bundle\CoursesBundle\Entity\Courses", mappedBy="typecourse")
     */
    private  $courses;

    /**
     * @var string
     *
     * @ORM\Column(name="nametypecourse", type="string", length=50)
     */
    private $nametypecourse;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->courses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     *
     */
    public function __toString()
    {
        return $this->nametypecourse;
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
     * Set nametypecourse
     *
     * @param string $nametypecourse
     * @return Typecourse
     */
    public function setNametypecourse($nametypecourse)
    {
        $this->nametypecourse = $nametypecourse;
    
        return $this;
    }

    /**
     * Get nametypecourse
     *
     * @return string 
     */
    public function getNametypecourse()
    {
        return $this->nametypecourse;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Typecourse
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
     * Add courses
     *
     * @param \Pfe\Bundle\CoursesBundle\Entity\Courses $courses
     * @return Typecourse
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
}