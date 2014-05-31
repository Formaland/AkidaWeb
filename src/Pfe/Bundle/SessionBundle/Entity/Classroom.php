<?php

namespace Pfe\Bundle\SessionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Classroom
 *
 * @ORM\Table(name="pfe_classroom")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\SessionBundle\Entity\Repository\ClassroomRepository")
 */
class Classroom
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
     * @ORM\ManyToOne(targetEntity="Pfe\Bundle\SessionBundle\Entity\Weeklysession", inversedBy="weeklysession")
     */
    protected $weeklysession;

    /**
     * @var string
     *
     * @ORM\Column(name="nameclassroom", type="string", length=50)
     */
    private $nameclassroom;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacity", type="integer", length=2)
     */
    private $capacity;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Pfe\Bundle\SessionBundle\Entity\Session", mappedBy="session", cascade={"all"})
     */
    private $sessions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sessions = new ArrayCollection();
    }

    /**
     * Entity toString
     */
    public function __toString()
    {
        return $this->nameclassroom;
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
     * Set capacity
     *
     * @param integer $capacity
     * @return capacity
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    
        return $this;
    }

    /**
     * Get capacity
     *
     * @return integer
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set Nameclassroom
     *
     * @param string $nameclassroom
     * @return Classroom
     */
    public function setNameclassroom($nameclassroom){
        $this->nameclassroom = $nameclassroom;

        return $this;
    }

    /**
     * Get nameclassroom
     *
     * @return string
     */
    public function getNameclassroom()
    {
        return $this->nameclassroom;
    }
    /**
     * Set weeklysession
     *
     * @param \Pfe\Bundle\SessionBundle\Entity\Weeklysession $weeklysession
     * @return Classroom
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
     * Add sessions
     *
     * @param \Pfe\Bundle\SessionBundle\Entity\Session $sessions
     * @return Classroom
     */
    public function addSession(\Pfe\Bundle\SessionBundle\Entity\Session $sessions)
    {
        $this->sessions[] = $sessions;
    
        return $this;
    }

    /**
     * Remove sessions
     *
     * @param \Pfe\Bundle\SessionBundle\Entity\Session $sessions
     */
    public function removeSession(\Pfe\Bundle\SessionBundle\Entity\Session $sessions)
    {
        $this->sessions->removeElement($sessions);
    }

    /**
     * Get sessions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSessions()
    {
        return $this->sessions;
    }
}