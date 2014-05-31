<?php

namespace Pfe\Bundle\SessionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Session
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Session
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var object Student
     *
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\UserBundle\Entity\Student", inversedBy="student",  cascade={"persist"})
     */
    protected $student;

    /**
     * @var object Classroom
     *
     * @ORM\JoinColumn(name="classroom_id", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Pfe\Bundle\SessionBundle\Entity\Classroom", inversedBy="sessions",  cascade={"all"})
     */
    protected $classroom;

    /**
     * @var object Weeklysession
     *
     * @ORM\JoinColumn(name="weeklysession_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\SessionBundle\Entity\Weeklysession", inversedBy="weeklysession",  cascade={"persist"})
     */
    protected $weeklysession;

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
     * Set date
     *
     * @param \DateTime $date
     * @return Session
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->student = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add student
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Student $student
     * @return Session
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
     * Set classroom
     *
     * @param \Pfe\Bundle\SessionBundle\Entity\Classroom $classroom
     * @return Session
     */
    public function setClassroom(\Pfe\Bundle\SessionBundle\Entity\Classroom $classroom = null)
    {
        $this->classroom = $classroom;
    
        return $this;
    }

    /**
     * Get classroom
     *
     * @return \Pfe\Bundle\SessionBundle\Entity\Classroom 
     */
    public function getClassroom()
    {
        return $this->classroom;
    }

    /**
     * Add weeklysession
     *
     * @param \Pfe\Bundle\SessionBundle\Entity\Weeklysession $weeklysession
     * @return Session
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
}