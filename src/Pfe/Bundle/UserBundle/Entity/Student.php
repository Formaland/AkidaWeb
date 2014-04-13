<?php

namespace Pfe\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table(name="pfe_student")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\UserBundle\Entity\Repository\StudentRepository")
 */
class Student
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
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=8, nullable=true)
     */
    protected $cin;

    /**
     * @var object User
     *
     * @ORM\Column(name="user_id")
     * @ORM\OneToOne(targetEntity="Pfe\Bundle\UserBundle\Entity\User", cascade={"persist"})
     */
    protected $user;

    public function __construct(){


    }

    /**
     * @param string $cin
     */
    public function setCin($cin)
    {
        $this->cin = $cin;
    }

    /**
     * @return string
     */
    public function getCin()
    {
        return $this->cin;
    }

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

    /**
     * @param object $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return object
     */
    public function getUser()
    {
        return $this->user;
    }


}
