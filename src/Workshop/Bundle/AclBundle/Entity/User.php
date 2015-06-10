<?php

namespace Workshop\Bundle\AclBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Workshop\Bundle\AclBundle\Validator\Constraints  as AclAssert;
/**
 * User
 *
 */
class User
{

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Type(type="alnum")
     * @Assert\Length(
     *      max = 20,
     * )
     */
    private $username;

    /**
     * @var string
     * @Assert\NotBlank()
     * @AclAssert\ContainsPassword()
     * @Assert\Length(
     *      min = 8,
     *      max = 20,
     * )
     */
    private $password;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Choice(choices = {"role1", "role2","role3"})
     */
    private $role;


    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }
}
