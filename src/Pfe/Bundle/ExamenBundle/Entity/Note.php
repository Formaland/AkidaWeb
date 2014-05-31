<?php

namespace Pfe\Bundle\ExamenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="pfe_note")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\ExamenBundle\Entity\Repository\NoteRepository")
 */
class Note
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
     *
     * @ORM\ManyToOne(targetEntity="Pfe\Bundle\UserBundle\Entity\Commission", inversedBy="note")
     *@ORM\JoinColumn(nullable=false)
     */
    protected $commissions;

    /**
     * @var integer
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;


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
     * Set note
     *
     * @param integer $note
     * @return Note
     */
    public function setNote($note)
    {
        $this->note = $note;
    
        return $this;
    }

    /**
     * Get note
     *
     * @return integer 
     */
    public function getNote()
    {
        return $this->note;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commissions = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add commission
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Commission $commission
     * @return Note
     */
    public function addCommission(\Pfe\Bundle\UserBundle\Entity\Commission $commissions)
    {
        $this->commissions[] = $commissions;
    
        return $this;
    }

    /**
     * Remove commission
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Commission $commission
     */
    public function removeCommission(\Pfe\Bundle\UserBundle\Entity\Commission $commissions)
    {
        $this->commissions->removeElement($commissions);
    }

    /**
     * Get commission
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommissions()
    {
        return $this->commissions;
    }

    /**
     * Set commission
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Commission $commission
     * @return Note
     */
    public function setCommission(\Pfe\Bundle\UserBundle\Entity\Commission $commissions)
    {
        $this->commissions = $commissions;
    
        return $this;
    }
}