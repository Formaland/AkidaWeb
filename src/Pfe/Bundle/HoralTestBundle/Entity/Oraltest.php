<?php

namespace Pfe\Bundle\HoralTestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Oraltest
 *
 * @ORM\Table(name="pfe_oraltest")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\HoralTestBundle\Entity\Repository\OraltestRepository")
 */
class Oraltest
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
     * @var object Hezb
     *
     * @ORM\JoinColumn(name="hezb_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\HoralTestBundle\Entity\Hezb", inversedBy="hezb",  cascade={"persist"})
     */
    protected $hezb;

    /**
     * @ORM\ManyToOne(targetEntity="Pfe\Bundle\SessionBundle\Entity\Weeklysession", inversedBy="weeklysession")
     */
    protected $weeklysession;

    /**
     * @var object Student
     *
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\UserBundle\Entity\Student", inversedBy="student",  cascade={"persist"})
     */
    protected $student;

    /**
     * @var object Teacher
     *
     * @ORM\JoinColumn(name="teacher_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\UserBundle\Entity\Teacher", inversedBy="teacher",  cascade={"persist"})
     */
    protected $teacher;

    /**
     * @var string
     *
     * @ORM\Column(name="nameoraltest", type="string", length=50)
     */
    private $nameoraltest;


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
     * Set nameoraltest
     *
     * @param string $nameoraltest
     * @return Oraltest
     */
    public function setNameoraltest($nameoraltest)
    {
        $this->nameoraltest = $nameoraltest;
    
        return $this;
    }

    /**
     * Get nameoraltest
     *
     * @return string 
     */
    public function getNameoraltest()
    {
        return $this->nameoraltest;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hezb = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add hezb
     *
     * @param \Pfe\Bundle\HezbBundle\Entity\Hezb $hezb
     * @return Oraltest
     */
    public function addHezb(\Pfe\Bundle\HezbBundle\Entity\Hezb $hezb)
    {
        $this->hezb[] = $hezb;
    
        return $this;
    }

    /**
     * Remove hezb
     *
     * @param \Pfe\Bundle\HezbBundle\Entity\Hezb $hezb
     */
    public function removeHezb(\Pfe\Bundle\HezbBundle\Entity\Hezb $hezb)
    {
        $this->hezb->removeElement($hezb);
    }

    /**
     * Get hezb
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHezb()
    {
        return $this->hezb;
    }

    /**
     * Set weeklysession
     *
     * @param \Pfe\Bundle\SessionBundle\Entity\Weeklysession $weeklysession
     * @return Oraltest
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
     * Add student
     *
     * @param \Pfe\Bundle\CoursesBundle\Entity\Student $student
     * @return Oraltest
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
     * Add teacher
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Teacher $teacher
     * @return Oraltest
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
}