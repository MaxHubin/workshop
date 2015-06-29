<?php

namespace Workshop\Bundle\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 * @Assert\Callback("validatePastProject", groups={"Default", "WorkshopRegistration"})
 */
class User extends BaseUser implements AdvancedUserInterface
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @ORM\Column(name="oxagile_salary",type="integer")
     * @Assert\NotBlank(groups={"Default", "WorkshopRegistration"})
     */
    protected $oxagileSalary;

    /**
     * @ORM\Column(name="past_project1",type="text")
     */
    protected $pastProject1;

    /**
     * @ORM\Column(name="past_project2",type="text")
     */
    protected $pastProject2;

    /**
     * @ORM\Column(name="past_project3",type="text")
     */
    protected $pastProject3;


    public function getPastProject1()
    {
        return $this->pastProject1;
    }

    public function setPastProject1($pastProject)
    {
        $this->pastProject1 = $pastProject;
    }

    public function getPastProject2()
    {
        return $this->pastProject2;
    }

    public function setPastProject2($pastProject)
    {
        $this->pastProject2 = $pastProject;
    }

    public function getPastProject3()
    {
        return $this->pastProject3;
    }

    public function setPastProject3($pastProject)
    {
        $this->pastProject3 = $pastProject;
    }


    /**
     * @return mixed
     */
    public function getOxagileSalary()
    {
        return $this->oxagileSalary;
    }

    /**
     * @param $oxagileSalary
     */
    public function setOxagileSalary($oxagileSalary)
    {
        $this->oxagileSalary = $oxagileSalary;
    }

    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
        parent::setPlainPassword("empty");
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->username = $email;
        parent::setEmail($email);
    }

    /**
     * @param string $emailCanonical
     */
    public function setEmailCanonical($emailCanonical)
    {
        $this->usernameCanonical = $emailCanonical;
        parent::setEmailCanonical($emailCanonical);
    }

    public function validatePastProject(ExecutionContextInterface $context)
    {
        $pastProjects = array(
            $this->pastProject1,
            $this->pastProject2,
            $this->pastProject3,
        );
        $pastProjectsFilter = array_filter($pastProjects);
        if (count($pastProjectsFilter) && (count($pastProjectsFilter) != count(array_unique($pastProjectsFilter)))) {
            $context->buildViolation('past project must be unique')
                ->atPath('pastProject1')
                ->atPath('pastProject2')
                ->atPath('pastProject3')
                ->addViolation();
        }
    }

}
