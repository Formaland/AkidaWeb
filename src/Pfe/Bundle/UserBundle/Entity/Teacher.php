<?php

namespace Pfe\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Pfe\Bundle\UserBundle\Entity\User as BaseUser;

/**
 * Teacher
 *
 * @ORM\Table(name="pfe_teacher")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\UserBundle\Entity\Repository\TeacherRepository")
 */
class Teacher
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
     * @ORM\Column(name="user_id")
     * @ORM\OneToOne(targetEntity="Pfe\Bundle\UserBundle\Entity\User", cascade={"persist"})
     */
    protected $user;

    public function __construct(){

        $this->user->setRoles(array('ROLE_TEACHER'));

    }

}
