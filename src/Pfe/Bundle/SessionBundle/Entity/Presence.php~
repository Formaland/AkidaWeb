<?php

namespace Pfe\Bundle\SessionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Presence
 *
 * @ORM\Table(name="pfe_presence")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\SessionBundle\Entity\Repository\PresenceRepository")
 */
class Presence
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
     * @var boolean
     *
     * @ORM\Column(name="presence", type="boolean")
     */
    private $presence;

    /**
     * @var object Student
     *
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\UserBundle\Entity\Student", inversedBy="student",  cascade={"persist"})
     */
    protected $students;


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
     * Set presence
     *
     * @param boolean $presence
     * @return Presence
     */
    public function setPresence($presence)
    {
        $this->presence = $presence;
    
        return $this;
    }

    /**
     * Get presence
     *
     * @return boolean 
     */
    public function getPresence()
    {
        return $this->presence;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->students = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add students
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Student $students
     * @return Presence
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
}