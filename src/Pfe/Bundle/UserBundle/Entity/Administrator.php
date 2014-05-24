<?php

namespace Pfe\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Administrator
 *
 * @ORM\Table(name="pfe_administrator")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\UserBundle\Entity\Repository\AdministratorRepository")
 */
class Administrator
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var object User
     *

     * @ORM\OneToOne(targetEntity="Pfe\Bundle\UserBundle\Entity\User", cascade={"persist"})
     */
    protected $user;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function getFullName()
    {
        return $this->getUser()->getFirstName() . ' ' . $this->getUser()->getLastName();
    }

    /**
     * Constructor
     */
    public function __construct()
    {

    }


    public function __toString()
    {
        return $this->getFullName();
    }

    /**
     * Set user
     *
     * @param \Pfe\Bundle\UserBundle\Entity\User $user
     * @return Student
     */
    public function setUser(\Pfe\Bundle\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Pfe\Bundle\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}