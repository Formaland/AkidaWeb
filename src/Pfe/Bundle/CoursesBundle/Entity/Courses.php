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
    protected $groups;

    /**
     * @var object Teacher
     *
     * @ORM\JoinColumn(name="teacher_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\UserBundle\Entity\Teacher", inversedBy="teacher",  cascade={"persist"})
     */
    protected $teachers;


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
     * Constructor
     */
    public function __construct()
    {
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
        $this->teachers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->weeklysession = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add groups
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Group $groups
     * @return Courses
     */
    public function addGroup(\Pfe\Bundle\UserBundle\Entity\Group $groups)
    {
        $this->groups[] = $groups;
    
        return $this;
    }

    /**
     * Remove groups
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Group $groups
     */
    public function removeGroup(\Pfe\Bundle\UserBundle\Entity\Group $groups)
    {
        $this->groups->removeElement($groups);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Add teachers
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Teacher $teachers
     * @return Courses
     */
    public function addTeacher(\Pfe\Bundle\UserBundle\Entity\Teacher $teachers)
    {
        $this->teachers[] = $teachers;
    
        return $this;
    }

    /**
     * Remove teachers
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Teacher $teachers
     */
    public function removeTeacher(\Pfe\Bundle\UserBundle\Entity\Teacher $teachers)
    {
        $this->teachers->removeElement($teachers);
    }

    /**
     * Get teachers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeachers()
    {
        return $this->teachers;
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
     * Get weeklysession
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWeeklysession()
    {
        return $this->weeklysession;
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