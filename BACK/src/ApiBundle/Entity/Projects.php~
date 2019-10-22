<?php

namespace ApiBundle\Entity;

/**
 * Projects
 */
class Projects
{
    /**
     * @var int
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

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
     * Set name
     *
     * @param string $name
     *
     * @return Projects
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Projects
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
     * Set active
     *
     * @param boolean $active
     *
     * @return Projects
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
     * @return Projects
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
     * @return Projects
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
    private $ProjectSubjects;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ProjectSubjects = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add projectSubject
     *
     * @param \ApiBundle\Entity\Subjects $projectSubject
     *
     * @return Projects
     */
    public function addProjectSubject(\ApiBundle\Entity\Subjects $projectSubject)
    {
        $this->ProjectSubjects[] = $projectSubject;

        return $this;
    }

    /**
     * Remove projectSubject
     *
     * @param \ApiBundle\Entity\Subjects $projectSubject
     */
    public function removeProjectSubject(\ApiBundle\Entity\Subjects $projectSubject)
    {
        $this->ProjectSubjects->removeElement($projectSubject);
    }

    /**
     * Get projectSubjects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjectSubjects()
    {
        return $this->ProjectSubjects;
    }
    /**
     * @var \DateTime
     */
    private $begin_at;

    /**
     * @var \DateTime
     */
    private $end_at;


    /**
     * Set beginAt
     *
     * @param \DateTime $beginAt
     *
     * @return Projects
     */
    public function setBeginAt($beginAt)
    {
        $this->begin_at = $beginAt;

        return $this;
    }

    /**
     * Get beginAt
     *
     * @return \DateTime
     */
    public function getBeginAt()
    {
        return $this->begin_at;
    }

    /**
     * Set endAt
     *
     * @param \DateTime $endAt
     *
     * @return Projects
     */
    public function setEndAt($endAt)
    {
        $this->end_at = $endAt;

        return $this;
    }

    /**
     * Get endAt
     *
     * @return \DateTime
     */
    public function getEndAt()
    {
        return $this->end_at;
    }
    /**
     * @var \ApiBundle\Entity\Users
     */
    private $ProjectUsers;


    /**
     * Set projectUsers
     *
     * @param \ApiBundle\Entity\Users $projectUsers
     *
     * @return Projects
     */
    public function setProjectUsers(\ApiBundle\Entity\Users $projectUsers = null)
    {
        $this->ProjectUsers = $projectUsers;

        return $this;
    }

    /**
     * Get projectUsers
     *
     * @return \ApiBundle\Entity\Users
     */
    public function getProjectUsers()
    {
        return $this->ProjectUsers;
    }
    /**
     * @var \ApiBundle\Entity\Users
     */
    private $UsersSubjects;


    /**
     * Set usersSubjects
     *
     * @param \ApiBundle\Entity\Users $usersSubjects
     *
     * @return Projects
     */
    public function setUsersSubjects(\ApiBundle\Entity\Users $usersSubjects = null)
    {
        $this->UsersSubjects = $usersSubjects;

        return $this;
    }

    /**
     * Get usersSubjects
     *
     * @return \ApiBundle\Entity\Users
     */
    public function getUsersSubjects()
    {
        return $this->UsersSubjects;
    }
}
