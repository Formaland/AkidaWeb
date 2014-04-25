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
     * @var object Courses
     *
     * @ORM\JoinColumn(name="courses_id", referencedColumnName="id")
     * @ORM\OneToOne(targetEntity="Pfe\Bundle\CoursesBundle\Entity\Courses", inversedBy="courses",  cascade={"persist"})
     */
    protected $courses;
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
     * Set courses
     *
     * @param string $courses
     * @return Typecourse
     */
    public function setCourses($courses)
    {
        $this->courses = $courses;
    
        return $this;
    }

    /**
     * Get courses
     *
     * @return string 
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * Set group
     *
     * @param \Pfe\Bundle\CoursesBundle\Entity\Courses $group
     * @return Typecourse
     */
    public function setGroup(\Pfe\Bundle\CoursesBundle\Entity\Courses $group = null)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return \Pfe\Bundle\CoursesBundle\Entity\Courses 
     */
    public function getGroup()
    {
        return $this->group;
    }
}