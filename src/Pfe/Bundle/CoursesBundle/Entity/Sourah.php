<?php

namespace Pfe\Bundle\CoursesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sourah
 *
 * @ORM\Table(name="pfe_sourah")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\CoursesBundle\Entity\Repository\SourahRepository")
 */
class Sourah
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
     * @var object Hezb
     *
     * @ORM\JoinColumn(name="hezb_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\CoursesBundle\Entity\Hezb", inversedBy="hezb",  cascade={"persist"})
     */
    protected $hezb;

    /**
     * @var string
     *
     * @ORM\Column(name="namesourah", type="string", length=50)
     */
    private $namesourah;

    /**
     * @var integer
     *
     * @ORM\Column(name="numsourah", type="integer")
     */
    private $numsourah;


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
     * Set namesourah
     *
     * @param string $namesourah
     * @return Souar
     */
    public function setNamesourah($namesourah)
    {
        $this->namesourah = $namesourah;
    
        return $this;
    }

    /**
     * Get namesourah
     *
     * @return string 
     */
    public function getNamesourah()
    {
        return $this->namesourah;
    }

    /**
     * Set numsourah
     *
     * @param integer $numsourah
     * @return Souar
     */
    public function setNumsourah($numsourah)
    {
        $this->numsourah = $numsourah;
    
        return $this;
    }

    /**
     * Get numsourah
     *
     * @return integer 
     */
    public function getNumsourah()
    {
        return $this->numsourah;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hezb = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add hezb
     *
     * @param \Pfe\Bundle\CoursesBundle\Entity\Hezb $hezb
     * @return Sourah
     */
    public function addHezb(\Pfe\Bundle\CoursesBundle\Entity\Hezb $hezb)
    {
        $this->hezb[] = $hezb;
    
        return $this;
    }

    /**
     * Remove hezb
     *
     * @param \Pfe\Bundle\CoursesBundle\Entity\Hezb $hezb
     */
    public function removeHezb(\Pfe\Bundle\CoursesBundle\Entity\Hezb $hezb)
    {
        $this->hezb->removeElement($hezb);
    }

    /**
     * Get hezb
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHezb()
    {
        return $this->hezb;
    }
}