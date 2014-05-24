<?php

namespace Pfe\Bundle\ExamenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typeexamen
 *
 * @ORM\Table(name="pfe_typeexamen")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\ExamenBundle\Entity\Repository\TypeexamenRepository")
 */
class Typeexamen
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
     * @ORM\Column(name="nametypeexamen", type="string", length=50)
     */
    private $nametypeexamen;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var object Examen
     *
     * @ORM\JoinColumn(name="examen_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\ExamenBundle\Entity\Examen", mappedBy="examen",  cascade={"persist"})
     */
    protected $examen;


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
     * Set nametypeexamen
     *
     * @param string $nametypeexamen
     * @return Typeexamen
     */
    public function setNametypeexamen($nametypeexamen)
    {
        $this->nametypeexamen = $nametypeexamen;
    
        return $this;
    }

    /**
     * Get nametypeexamen
     *
     * @return string 
     */
    public function getNametypeexamen()
    {
        return $this->nametypeexamen;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Typeexamen
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
        $this->examen = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add examen
     *
     * @param \Pfe\Bundle\ExamenBundle\Entity\Examen $examen
     * @return Typeexamen
     */
    public function addExamen(\Pfe\Bundle\ExamenBundle\Entity\Examen $examen)
    {
        $this->examen[] = $examen;
    
        return $this;
    }

    /**
     * Remove examen
     *
     * @param \Pfe\Bundle\ExamenBundle\Entity\Examen $examen
     */
    public function removeExamen(\Pfe\Bundle\ExamenBundle\Entity\Examen $examen)
    {
        $this->examen->removeElement($examen);
    }

    /**
     * Get examen
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExamen()
    {
        return $this->examen;
    }

    public function __toString()
    {
        return $this->getNametypeexamen();
    }
}