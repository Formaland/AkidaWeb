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
    protected $student;
    /**
     * @var object Typeexamen
     *
     * @ORM\JoinColumn(name="typeexamen_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\ExamenBundle\Entity\Typeexamen", inversedBy="typeexamen",  cascade={"persist"})
     */
    protected $typeexamen;

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
    protected $commission;
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
        $this->group = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add group
     *
     * @param \Pfe\Bundle\UserBundle\Entity\group $group
     * @return Examen
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
     * Add student
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Student $student
     * @return Examen
     */
    public function addStudent(\Pfe\Bundle\UserBundle\Entity\Student $student)
    {
        $this->student[] = $student;
    
        return $this;
    }

    /**
     * Remove student
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Student $student
     */
    public function removeStudent(\Pfe\Bundle\UserBundle\Entity\Student $student)
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
     * Add typeexamen
     *
     * @param \Pfe\Bundle\ExamenBundle\Entity\Typeexamen $typeexamen
     * @return Examen
     */
    public function addTypeexamen(\Pfe\Bundle\ExamenBundle\Entity\Typeexamen $typeexamen)
    {
        $this->typeexamen[] = $typeexamen;
    
        return $this;
    }

    /**
     * Remove typeexamen
     *
     * @param \Pfe\Bundle\ExamenBundle\Entity\Typeexamen $typeexamen
     */
    public function removeTypeexamen(\Pfe\Bundle\ExamenBundle\Entity\Typeexamen $typeexamen)
    {
        $this->typeexamen->removeElement($typeexamen);
    }

    /**
     * Get typeexamen
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTypeexamen()
    {
        return $this->typeexamen;
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
     * Add commission
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Commission $commission
     * @return Examen
     */
    public function addCommission(\Pfe\Bundle\UserBundle\Entity\Commission $commission)
    {
        $this->commission[] = $commission;
    
        return $this;
    }

    /**
     * Remove commission
     *
     * @param \Pfe\Bundle\userBundle\Entity\Commission $commission
     */
    public function removeCommission(\Pfe\Bundle\UserBundle\Entity\Commission $commission)
    {
        $this->commission->removeElement($commission);
    }

    /**
     * Get commission
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommission()
    {
        return $this->commission;
    }
}