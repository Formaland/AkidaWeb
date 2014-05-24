<?php

namespace Pfe\Bundle\ExamenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Examen
 *
 * @ORM\Table(name="pfe_examen")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\ExamenBundle\Entity\Repository\ExamenRepository")
 */
class Examen
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
     * @var object Student
     *
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\UserBundle\Entity\Student", inversedBy="student",  cascade={"persist"})
     */
    protected $students;
    /**
     * @var object Typeexamen
     *
     * @ORM\JoinColumn(name="typeexamen_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\ExamenBundle\Entity\Typeexamen", inversedBy="typeexamen",  cascade={"persist"})
     */
    protected $typeexamens;

    /**
     * @var object Courses
     *
     * @ORM\JoinColumn(name="courses_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\CoursesBundle\Entity\Courses", inversedBy="coursees",  cascade={"persist"})
     */
    protected $courses;

    /**
     * @var object Commission
     *
     * @ORM\JoinColumn(name="commission_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\UserBundle\Entity\Commission", inversedBy="commission",  cascade={"persist"})
     */
    protected $commissions;
    /**
     * @var string
     *
     * @ORM\Column(name="nameexamen", type="string", length=30)
     * @Assert\NotBlank()
     */
    private $nameexamen;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateexamen", type="date")
     */
    private $dateexamen;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="starttime", type="time")
     */
    private $starttime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endtime", type="time")
     */
    private $endtime;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=255)
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
     * Set nameexamen
     *
     * @param string $nameexamen
     * @return Examen
     */
    public function setNameexamen($nameexamen)
    {
        $this->nameexamen = $nameexamen;
    
        return $this;
    }

    /**
     * Get nameexamen
     *
     * @return string 
     */
    public function getNameexamen()
    {
        return $this->nameexamen;
    }

    /**
     * Set dateexamen
     *
     * @param \DateTime $dateexamen
     * @return Examen
     */
    public function setDateexamen($dateexamen)
    {
        $this->dateexamen = $dateexamen;
    
        return $this;
    }

    /**
     * Get dateexamen
     *
     * @return \DateTime 
     */
    public function getDateexamen()
    {
        return $this->dateexamen;
    }


    /**
     * Set starttime
     *
     * @param \DateTime $starttime
     * @return Examen
     */
    public function setStarttime($starttime)
    {
        $this->starttime = $starttime;
    
        return $this;
    }

    /**
     * Get starttime
     *
     * @return \DateTime 
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

    /**
     * Set endtime
     *
     * @param \DateTime $endtime
     * @return Examen
     */
    public function setEndtime($endtime)
    {
        $this->endtime = $endtime;
    
        return $this;
    }

    /**
     * Get endtime
     *
     * @return \DateTime 
     */
    public function getEndtime()
    {
        return $this->endtime;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Examen
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
     * Constructor
     */
    public function __construct()
    {
        $this->students = new \Doctrine\Common\Collections\ArrayCollection();
        $this->typeexamens = new \Doctrine\Common\Collections\ArrayCollection();
        $this->courses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commissions = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add students
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Student $students
     * @return Examen
     */
    public function addStudent(\Pfe\Bundle\UserBundle\Entity\Student $students)
    {
        $this->students[] = $students;
    
        return $this;
    }

    /**
     * Remove students
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Student $students
     */
    public function removeStudent(\Pfe\Bundle\UserBundle\Entity\Student $students)
    {
        $this->students->removeElement($students);
    }

    /**
     * Get students
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * Add typeexamens
     *
     * @param \Pfe\Bundle\ExamenBundle\Entity\Typeexamen $typeexamens
     * @return Examen
     */
    public function addTypeexamen(\Pfe\Bundle\ExamenBundle\Entity\Typeexamen $typeexamens)
    {
        $this->typeexamens[] = $typeexamens;
    
        return $this;
    }

    /**
     * Remove typeexamens
     *
     * @param \Pfe\Bundle\ExamenBundle\Entity\Typeexamen $typeexamens
     */
    public function removeTypeexamen(\Pfe\Bundle\ExamenBundle\Entity\Typeexamen $typeexamens)
    {
        $this->typeexamens->removeElement($typeexamens);
    }

    /**
     * Get typeexamens
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTypeexamens()
    {
        return $this->typeexamens;
    }

    /**
     * Add courses
     *
     * @param \Pfe\Bundle\CoursesBundle\Entity\Courses $courses
     * @return Examen
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
     * Add commissions
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Commission $commissions
     * @return Examen
     */
    public function addCommission(\Pfe\Bundle\UserBundle\Entity\Commission $commissions)
    {
        $this->commissions[] = $commissions;
    
        return $this;
    }

    /**
     * Remove commissions
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Commission $commissions
     */
    public function removeCommission(\Pfe\Bundle\UserBundle\Entity\Commission $commissions)
    {
        $this->commissions->removeElement($commissions);
    }

    /**
     * Get commissions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommissions()
    {
        return $this->commissions;
    }
}