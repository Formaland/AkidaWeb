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
     * @var \DateTime
     *
     * @ORM\Column(name="durationcourses", type="datetime")
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
     * @ORM\ManyToOne(targetEntity="Pfe\Bundle\SessionBundle\Entity\Weeklysession", inversedBy="weeklysession")
     */
    protected $weeklysession;



    public function __construct()
    {
        $this->group = new ArrayCollection();
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
}