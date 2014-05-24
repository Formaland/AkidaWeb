<?php

namespace Pfe\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Pfe\Bundle\UserBundle\Entity\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Teacher
 *
 * @ORM\Table(name="pfe_teacher")
 * @ORM\Entity(repositoryClass="Pfe\Bundle\UserBundle\Entity\Repository\TeacherRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @var string
     *
     * @ORM\Column(name="diplome", type="string", length=80, nullable=true)
     * @Assert\NotBlank()
     */
    protected $diplome;

    /**
     * @var object Courses
     *
     * @ORM\JoinColumn(name="courses_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\CoursesBundle\Entity\Courses", mappedBy="courses",  cascade={"persist"})
     */
    protected $courses;

    /**
     * @var object Oraltest
     *
     * @ORM\JoinColumn(name="oraltest_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\HoralTestBundle\Entity\Oraltest", mappedBy="oraltest",  cascade={"persist"})
     */
    protected $oraltest;


    /**
     * @var object Commission
     *
     * @ORM\JoinColumn(name="commission_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="Pfe\Bundle\UserBundle\Entity\Commission", mappedBy="commission",  cascade={"persist"})
     */
    protected $commission;

    /**
     * @var object User
     *
     *
     * @ORM\OneToOne(targetEntity="Pfe\Bundle\UserBundle\Entity\User", cascade={"persist"})
     *
     */
    protected $user;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text",length=255,  nullable=true)
     */
    protected $description;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new User();
        $this->user->addRole('ROLE_TEACHER');
        $this->user->setEnabled(true);
    }

    /**
     * Entity Class To String
     */
    public function __toString()
    {
        if($this->getUser())
        {
            return $this->getUser()->getFirstName . ' ' . $this->getUser()->getLastName();
        }
        return '';
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
     * Set diplome
     *
     * @param string $diplome
     * @return User
     */
    public function setDiplome($diplome)
    {
        $this->diplome = $diplome;

        return $this;
    }

    /**
     * Get diplome
     *
     * @return string
     */
    public function getDiplome()
    {
        return $this->diplome;
    }



    /**
     * Set description
     *
     * @param string $description
     * @return Teacher
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
     * Add courses
     *
     * @param \Pfe\Bundle\CoursesBundle\Entity\Courses $courses
     * @return Teacher
     */
    public function addCourse(\Pfe\Bundle\CoursesBundle\Entity\Courses $courses)
    {
        $this->courses[] = $courses;
    
        return $this;
    }

    /**
     * Remove courses
     *
     * @param \Pfe\Bundle\CoursesBundle\Entity\Courses $courses
     */
    public function removeCourse(\Pfe\Bundle\CoursesBundle\Entity\Courses $courses)
    {
        $this->courses->removeElement($courses);
    }

    /**
     * Get courses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * Add commission
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Commission $commission
     * @return Teacher
     */
    public function addCommission(\Pfe\Bundle\UserBundle\Entity\Commission $commission)
    {
        $this->commission[] = $commission;
    
        return $this;
    }

    /**
     * Remove commission
     *
     * @param \Pfe\Bundle\UserBundle\Entity\Commission $commission
     */
    public function removeCommission(\Pfe\Bundle\UserBundle\Entity\Commission $commission)
    {
        $this->commission->removeElement($commission);
    }

    /**
     * Get commission
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * Add oraltest
     *
     * @param \Pfe\Bundle\HoralTestBundle\Entity\Oraltest $oraltest
     * @return Teacher
     */
    public function addOraltest(\Pfe\Bundle\HoralTestBundle\Entity\Oraltest $oraltest)
    {
        $this->oraltest[] = $oraltest;
    
        return $this;
    }

    /**
     * Remove oraltest
     *
     * @param \Pfe\Bundle\HoralTestBundle\Entity\Oraltest $oraltest
     */
    public function removeOraltest(\Pfe\Bundle\HoralTestBundle\Entity\Oraltest $oraltest)
    {
        $this->oraltest->removeElement($oraltest);
    }

    /**
     * Get oraltest
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOraltest()
    {
        return $this->oraltest;
    }

    /**
     * Set user
     *
     * @param \Pfe\Bundle\UserBundle\Entity\User $user
     * @return Teacher
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

    /*
     * @ORM\preUpdate
     */
    public function updateTeacher()
    {
        $this->getUser()->addRole('ROLE_TEACHER');
    }
}