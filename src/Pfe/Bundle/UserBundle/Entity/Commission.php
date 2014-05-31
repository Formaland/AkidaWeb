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
    private  $teachers;

    /**
     * @ORM\OneToMany(targetEntity="Pfe\Bundle\ExamenBundle\Entity\Note", mappedBy="commission")
     */
    private  $note;

    /**
     * @var object Examen
     *
     * @ORM\JoinColumn(name="examen_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\ExamenBundle\Entity\Examen", mappedBy="examen",  cascade={"persist"})
     */
    protected $examens;
    /**
     * @var string
     *
     * @ORM\Column(name="typecommission", type="string", length=50)
     */
    private $typecommission;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text",length=255,  nullable=true)
     */
    private $description;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->teachers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->note = new \Doctrine\Common\Collections\ArrayCollection();
        $this->examens = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getTypecommission();
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
     * Add teachers
     *
     * @param \Pfe\Bundle\UserBundle\Entity\teacher $teachers
     * @return Commission
     */
    public function addTeacher(\Pfe\Bundle\UserBundle\Entity\teacher $teachers)
    {
        $this->teachers[] = $teachers;
    
        return $this;
    }

    /**
     * Remove teachers
     *
     * @param \Pfe\Bundle\UserBundle\Entity\teacher $teachers
     */
    public function removeTeacher(\Pfe\Bundle\UserBundle\Entity\teacher $teachers)
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
     * Add note
     *
     * @param \Pfe\Bundle\ExamenBundle\Entity\Note $note
     * @return Commission
     */
    public function addNote(\Pfe\Bundle\ExamenBundle\Entity\Note $note)
    {
        $this->note[] = $note;
    
        return $this;
    }

    /**
     * Remove note
     *
     * @param \Pfe\Bundle\ExamenBundle\Entity\Note $note
     */
    public function removeNote(\Pfe\Bundle\ExamenBundle\Entity\Note $note)
    {
        $this->note->removeElement($note);
    }

    /**
     * Get note
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Add examens
     *
     * @param \Pfe\Bundle\ExamenBundle\Entity\Examen $examens
     * @return Commission
     */
    public function addExamen(\Pfe\Bundle\ExamenBundle\Entity\Examen $examens)
    {
        $this->examens[] = $examens;
    
        return $this;
    }

    /**
     * Remove examens
     *
     * @param \Pfe\Bundle\ExamenBundle\Entity\Examen $examens
     */
    public function removeExamen(\Pfe\Bundle\ExamenBundle\Entity\Examen $examens)
    {
        $this->examens->removeElement($examens);
    }

    /**
     * Get examens
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExamens()
    {
        return $this->examens;
    }
}