<?php

namespace Pfe\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commission
 *
 * @ORM\Table(name="pfe_commission")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\UserBundle\Entity\Repository\CommissionRepository")
 */
class Commission
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
     * @var object Teacher
     *
     * @ORM\JoinColumn(name="teacher_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\UserBundle\Entity\teacher", inversedBy="teacher",  cascade={"persist"})
     */
    protected $teacher;

    /**
     * @ORM\ManyToOne(targetEntity="Pfe\Bundle\CoursesBundle\Entity\Note", inversedBy="commission")
     */
    protected $note;

    /**
     * @var string
     *
     * @ORM\Column(name="typecommission", type="string", length=50)
     */
    private $typecommission;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
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
     * Set typecommission
     *
     * @param string $typecommission
     * @return Commission
     */
    public function setTypecommission($typecommission)
    {
        $this->typecommission = $typecommission;
    
        return $this;
    }

    /**
     * Get typecommission
     *
     * @return string 
     */
    public function getTypecommission()
    {
        return $this->typecommission;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Commission
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
        $this->teacher = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add teacher
     *
     * @param \Pfe\Bundle\UserBundle\Entity\teacher $teacher
     * @return Commission
     */
    public function addTeacher(\Pfe\Bundle\UserBundle\Entity\teacher $teacher)
    {
        $this->teacher[] = $teacher;
    
        return $this;
    }

    /**
     * Remove teacher
     *
     * @param \Pfe\Bundle\UserBundle\Entity\teacher $teacher
     */
    public function removeTeacher(\Pfe\Bundle\UserBundle\Entity\teacher $teacher)
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
     * Set note
     *
     * @param \Pfe\Bundle\CoursesBundle\Entity\Note $note
     * @return Commission
     */
    public function setNote(\Pfe\Bundle\CoursesBundle\Entity\Note $note = null)
    {
        $this->note = $note;
    
        return $this;
    }

    /**
     * Get note
     *
     * @return \Pfe\Bundle\CoursesBundle\Entity\Note 
     */
    public function getNote()
    {
        return $this->note;
    }
    public function __toString()
    {
        return $this->getTypecommission();
    }
}