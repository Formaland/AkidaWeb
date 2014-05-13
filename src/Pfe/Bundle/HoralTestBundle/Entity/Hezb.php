<?php

namespace Pfe\Bundle\HoralTestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hezb
 *
 * @ORM\Table(name="pfe_hezb")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\HoralTestBundle\Entity\Repository\HezbRepository")
 */
class Hezb
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
     * @var integer
     *
     * @ORM\Column(name="Numhezb", type="integer")
     */
    private $numhezb;

    /**
     * @var object Sourah
     *
     * @ORM\JoinColumn(name="sourah_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\HoralTestBundle\Entity\Sourah", mappedBy="sourah",  cascade={"persist"})
     */
    protected $sourah;

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
     * Set numhezb
     *
     * @param integer $numhezb
     * @return Ahzab
     */
    public function setNumhezb($numhezb)
    {
        $this->numhezb = $numhezb;
    
        return $this;
    }

    /**
     * Get numhezb
     *
     * @return integer 
     */
    public function getNumhezb()
    {
        return $this->numhezb;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sourah = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add sourah
     *
     * @param \Pfe\Bundle\HoralTestBundle\Entity\Sourah $sourah
     * @return Hezb
     */
    public function addSourah(\Pfe\Bundle\HoralTestBundle\Entity\Sourah $sourah)
    {
        $this->sourah[] = $sourah;
    
        return $this;
    }

    /**
     * Remove sourah
     *
     * @param \Pfe\Bundle\HoralTestBundle\Entity\Sourah $sourah
     */
    public function removeSourah(\Pfe\Bundle\HoralTestBundle\Entity\Sourah $sourah)
    {
        $this->sourah->removeElement($sourah);
    }

    /**
     * Get sourah
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSourah()
    {
        return $this->sourah;
    }
}