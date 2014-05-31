<?php

namespace Pfe\Bundle\SessionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Weeklysession
 *
 * @ORM\Table(name="pfe_weeklysession")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\SessionBundle\Entity\Repository\WeeklysessionRepository")
 */
class Weeklysession
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
     * @ORM\OneToMany(targetEntity="Pfe\Bundle\SessionBundle\Entity\Classroom", mappedBy="weeklysession")
     * @ORM\JoinColumn(name="weeklysession_id", referencedColumnName="id")
     */
    protected $classroom;



    /**
     * @ORM\OneToMany(targetEntity="Pfe\Bundle\CoursesBundle\Entity\Courses", mappedBy="weeklysession")
     * @ORM\JoinColumn(name="weeklysession_id", referencedColumnName="id")
     */
    protected $courses;

    /**
     * @ORM\OneToMany(targetEntity="Pfe\Bundle\HoralTestBundle\Entity\Oraltest", mappedBy="weeklysession")
     * @ORM\JoinColumn(name="weeklysession_id", referencedColumnName="id")
     */
    protected $oraltest;


    /**
     * @var \String
     *
     * @ORM\Column(name="day", type="string")
     */
    private $day;

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
     * Constructor
     */
    public function __construct()
    {
        $this->courses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getDay();
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
     * Set day
     *
     * @param string $day
     * @return Weeklysession
     */
    public function setDay($day)
    {
        $this->day = $day;
    
        return $this;
    }

    /**
     * Get day
     *
     * @return string 
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set starttime
     *
     * @param \DateTime $starttime
     * @return Weeklysession
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
     * @return Weeklysession
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
     * Add classroom
     *
     * @param \Pfe\Bundle\SessionBundle\Entity\Classroom $classroom
     * @return Weeklysession
     */
    public function addClassroom(\Pfe\Bundle\SessionBundle\Entity\Classroom $classroom)
    {
        $this->classroom[] = $classroom;
    
        return $this;
    }

    /**
     * Remove classroom
     *
     * @param \Pfe\Bundle\SessionBundle\Entity\Classroom $classroom
     */
    public function removeClassroom(\Pfe\Bundle\SessionBundle\Entity\Classroom $classroom)
    {
        $this->classroom->removeElement($classroom);
    }

    /**
     * Get classroom
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClassroom()
    {
        return $this->classroom;
    }

    /**
     * Add courses
     *
     * @param \Pfe\Bundle\CoursesBundle\Entity\Courses $courses
     * @return Weeklysession
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
     * Add oraltest
     *
     * @param \Pfe\Bundle\HoralTestBundle\Entity\Oraltest $oraltest
     * @return Weeklysession
     */
    public function addOraltest(\Pfe\Bundle\HoralTestBundle\Entity\Oraltest $oraltest)
    {
        $this->oraltest[] = $oraltest;
    
        return $this;
    }

    /**
     * Remove oraltest
     *
     * @param \Pfe\Bundle\HoralTestBundle\Entity\Oraltest $oraltest
     */
    public function removeOraltest(\Pfe\Bundle\HoralTestBundle\Entity\Oraltest $oraltest)
    {
        $this->oraltest->removeElement($oraltest);
    }

    /**
     * Get oraltest
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOraltest()
    {
        return $this->oraltest;
    }
}