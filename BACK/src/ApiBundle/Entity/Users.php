<?php

namespace ApiBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Users
 */
class Users
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $email;

    /**
     * @var integer
     */
    private $role;

    /**
     * @var boolean
     */
    private $active = 1;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $update_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $UsersTeam;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->UsersTeam = new ArrayCollection();
    }

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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Users
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Users
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set role
     *
     * @param integer $role
     *
     * @return Users
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return integer
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Users
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Users
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return Users
     */
    public function setUpdateAt($updateAt)
    {
        $this->update_at = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->update_at;
    }

    /**
     * Add usersTeam
     *
     * @param \ApiBundle\Entity\Users_team $usersTeam
     *
     * @return Users
     */
    public function addUsersTeam(\ApiBundle\Entity\Users_team $usersTeam)
    {
        $this->UsersTeam[] = $usersTeam;

        return $this;
    }

    /**
     * Remove usersTeam
     *
     * @param \ApiBundle\Entity\Users_team $usersTeam
     */
    public function removeUsersTeam(\ApiBundle\Entity\Users_team $usersTeam)
    {
        $this->UsersTeam->removeElement($usersTeam);
    }

    /**
     * Get usersTeam
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsersTeam()
    {
        return $this->UsersTeam;
    }

    public function insertCreatedAtAuto()
    {
        $this->setCreatedAt(new \DateTime());
    }
    public function insertUpdateAtAuto()
    {
        $this->setUpdateAt(new \DateTime());
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $UsersProjects;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $UsersSubjects;


    /**
     * Add usersProject
     *
     * @param \ApiBundle\Entity\Projects $usersProject
     *
     * @return Users
     */
    public function addUsersProject(\ApiBundle\Entity\Projects $usersProject)
    {
        $this->UsersProjects[] = $usersProject;

        return $this;
    }

    /**
     * Remove usersProject
     *
     * @param \ApiBundle\Entity\Projects $usersProject
     */
    public function removeUsersProject(\ApiBundle\Entity\Projects $usersProject)
    {
        $this->UsersProjects->removeElement($usersProject);
    }

    /**
     * Get usersProjects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsersProjects()
    {
        return $this->UsersProjects;
    }

    /**
     * Add usersSubject
     *
     * @param \ApiBundle\Entity\Subjects $usersSubject
     *
     * @return Users
     */
    public function addUsersSubject(\ApiBundle\Entity\Subjects $usersSubject)
    {
        $this->UsersSubjects[] = $usersSubject;

        return $this;
    }

    /**
     * Remove usersSubject
     *
     * @param \ApiBundle\Entity\Subjects $usersSubject
     */
    public function removeUsersSubject(\ApiBundle\Entity\Subjects $usersSubject)
    {
        $this->UsersSubjects->removeElement($usersSubject);
    }

    /**
     * Get usersSubjects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsersSubjects()
    {
        return $this->UsersSubjects;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $UsersCoatch;


    /**
     * Add usersCoatch
     *
     * @param \ApiBundle\Entity\Subjects_coatch $usersCoatch
     *
     * @return Users
     */
    public function addUsersCoatch(\ApiBundle\Entity\Subjects_coatch $usersCoatch)
    {
        $this->UsersCoatch[] = $usersCoatch;

        return $this;
    }

    /**
     * Remove usersCoatch
     *
     * @param \ApiBundle\Entity\Subjects_coatch $usersCoatch
     */
    public function removeUsersCoatch(\ApiBundle\Entity\Subjects_coatch $usersCoatch)
    {
        $this->UsersCoatch->removeElement($usersCoatch);
    }

    /**
     * Get usersCoatch
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsersCoatch()
    {
        return $this->UsersCoatch;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $UsersCoatchTransactionToken;


    /**
     * Add usersCoatchTransactionToken
     *
     * @param \ApiBundle\Entity\Tokens_transaction $usersCoatchTransactionToken
     *
     * @return Users
     */
    public function addUsersCoatchTransactionToken(\ApiBundle\Entity\Tokens_transaction $usersCoatchTransactionToken)
    {
        $this->UsersCoatchTransactionToken[] = $usersCoatchTransactionToken;

        return $this;
    }

    /**
     * Remove usersCoatchTransactionToken
     *
     * @param \ApiBundle\Entity\Tokens_transaction $usersCoatchTransactionToken
     */
    public function removeUsersCoatchTransactionToken(\ApiBundle\Entity\Tokens_transaction $usersCoatchTransactionToken)
    {
        $this->UsersCoatchTransactionToken->removeElement($usersCoatchTransactionToken);
    }

    /**
     * Get usersCoatchTransactionToken
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsersCoatchTransactionToken()
    {
        return $this->UsersCoatchTransactionToken;
    }
}
