<?php

namespace Pfe\Bundle\CoursesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hezb
 *
 * @ORM\Table(name="pfe_hezb")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\CoursesBundle\Entity\Repository\HezbRepository")
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
}