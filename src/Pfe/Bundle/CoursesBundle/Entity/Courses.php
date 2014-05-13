<?php

namespace Pfe\Bundle\CoursesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Group
 *
 * @ORM\Table(name="pfe_courses")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\CoursesBundle\Entity\Repository\CoursesRepository")
 */
class Courses
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
     * @ORM\Column(name="namecourses", type="string", length=50)
     */
    private $namecourses;

    /**
     * @var \Time
     *
     * @ORM\Column(name="durationcourses", type="time")
     */
    private $durationcourses;

    /**
     * @var object Group
     *
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\UserBundle\Entity\Group", inversedBy="group",  cascade={"persist"})
     */
    protected $group;

    /**
     * @var object Teacher
     *
     * @ORM\JoinColumn(name="teacher_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\UserBundle\Entity\Teacher", inversedBy="teacher",  cascade={"persist"})
     */
    protected $teacher;


    /**
     * @ORM\OneToMany(targetEntity="Pfe\Bundle\SessionBundle\Entity\Weeklysession", mappedBy="courses")
     */
    protected $weeklysession;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Pfe\Bundle\CoursesBundle\Entity\Typecourse", inversedBy="typecourse")
     *@ORM\JoinColumn(nullable=false)
     */
    protected $typecourse;



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
     * Set namecourses
     *
     * @param string $namecourses
     * @return Courses
     */
    public function setNamecourses($namecourses)
    {
        $this->namecourses = $namecourses;
    
        return $this;
    }

    /**
     * Get namecourses
     *
     * @return string 
     */
    public function getNamecourses()
    {
        return $this->namecourses;
    }

    /**
     * Set durationcourses
     *
     * @param \DateTime $durationcourses
     * @return Courses
     */
    public function setDurationcourses($durationcourses)
    {
        $this->durationcourses = $durationcourses;
    
        return $this;
    }

    /**
     * Get durationcourses
     *
     * @return \DateTime 
     */
    public function getDurationcourses()
    {
        return $this->durationcourses;
    }

    /**
     * Add group
     *
     * @param \Pfe\Bundle\UserBundle\Entity\group $group
     * @return Courses
     */
    public function addGroup(\Pfe\Bundle\UserBundle\Entity\group $group)
    {
        $this->group[] = $group;
    
        return $this;
    }

    /**
     * Remove group
     *
     * @param \Pfe\Bundle\UserBundle\Entity\group $group
     */
    public function removeGroup(\Pfe\Bundle\UserBundle\Entity\group $group)
    {
        $this->group->removeElement($group);
    }

    /**
     * Get group
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set weeklysession
     *
     * @param \Pfe\Bundle\SessionBundle\Entity\Weeklysession $weeklysession
     * @return Courses
     */
    public function setWeeklysession(\Pfe\Bundle\SessionBundle\Entity\Weeklysession $weeklysession = null)
    {
        $this->weeklysession = $weeklysession;
    
        return $this;
    }

    /**
     * Get weeklysession
     *
     * @return \Pfe\Bundle\SessionBundle\Entity\Weeklysession 
     */
    public function getWeeklysession()
    {
        return $this->weeklysession;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->group = new \Doctrine\Common\Collections\ArrayCollection();
        $this->teacher = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add teacher
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Teacher $teacher
     * @return Courses
     */
    public function addTeacher(\Pfe\Bundle\UserBundle\Entity\Teacher $teacher)
    {
        $this->teacher[] = $teacher;
    
        return $this;
    }

    /**
     * Remove teacher
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Teacher $teacher
     */
    public function removeTeacher(\Pfe\Bundle\UserBundle\Entity\Teacher $teacher)
    {
        $this->teacher->removeElement($teacher);
    }

    /**
     * Get teacher
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * Add weeklysession
     *
     * @param \Pfe\Bundle\SessionBundle\Entity\Weeklysession $weeklysession
     * @return Courses
     */
    public function addWeeklysession(\Pfe\Bundle\SessionBundle\Entity\Weeklysession $weeklysession)
    {
        $this->weeklysession[] = $weeklysession;
    
        return $this;
    }

    /**
     * Remove weeklysession
     *
     * @param \Pfe\Bundle\SessionBundle\Entity\Weeklysession $weeklysession
     */
    public function removeWeeklysession(\Pfe\Bundle\SessionBundle\Entity\Weeklysession $weeklysession)
    {
        $this->weeklysession->removeElement($weeklysession);
    }

    /**
     * Set typecourse
     *
     * @param \Pfe\Bundle\CoursesBundle\Entity\Typecourse $typecourse
     * @return Courses
     */
    public function setTypecourse(\Pfe\Bundle\CoursesBundle\Entity\Typecourse $typecourse)
    {
        $this->typecourse = $typecourse;
    
        return $this;
    }

    /**
     * Get typecourse
     *
     * @return \Pfe\Bundle\CoursesBundle\Entity\Typecourse 
     */
    public function getTypecourse()
    {
        return $this->typecourse;
    }
}