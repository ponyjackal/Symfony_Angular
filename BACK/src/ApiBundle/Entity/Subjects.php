<?php

namespace ApiBundle\Entity;

/**
 * Subjects
 */
class Subjects
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
     * @return Subjects
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
     * @return Subjects
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
     * @return Subjects
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
     * @return Subjects
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
     * @return Subjects
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
    private $SubjectTeamDetails;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->SubjectTeamDetails = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add subjectTeamDetail
     *
     * @param \ApiBundle\Entity\Subjects_team $subjectTeamDetail
     *
     * @return Subjects
     */
    public function addSubjectTeamDetail(\ApiBundle\Entity\Subjects_team $subjectTeamDetail)
    {
        $this->SubjectTeamDetails[] = $subjectTeamDetail;

        return $this;
    }

    /**
     * Remove subjectTeamDetail
     *
     * @param \ApiBundle\Entity\Subjects_team $subjectTeamDetail
     */
    public function removeSubjectTeamDetail(\ApiBundle\Entity\Subjects_team $subjectTeamDetail)
    {
        $this->SubjectTeamDetails->removeElement($subjectTeamDetail);
    }

    /**
     * Get subjectTeamDetails
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubjectTeamDetails()
    {
        return $this->SubjectTeamDetails;
    }
    /**
     * @var \ApiBundle\Entity\Projects
     */
    private $SubjectProject;


    /**
     * Set subjectProject
     *
     * @param \ApiBundle\Entity\Projects $subjectProject
     *
     * @return Subjects
     */
    public function setSubjectProject(\ApiBundle\Entity\Projects $subjectProject = null)
    {
        $this->SubjectProject = $subjectProject;

        return $this;
    }

    /**
     * Get subjectProject
     *
     * @return \ApiBundle\Entity\Projects
     */
    public function getSubjectProject()
    {
        return $this->SubjectProject;
    }
    /**
     * @var \ApiBundle\Entity\Users
     */
    private $SubjectUsers;


    /**
     * Set subjectUsers
     *
     * @param \ApiBundle\Entity\Users $subjectUsers
     *
     * @return Subjects
     */
    public function setSubjectUsers(\ApiBundle\Entity\Users $subjectUsers = null)
    {
        $this->SubjectUsers = $subjectUsers;

        return $this;
    }

    /**
     * Get subjectUsers
     *
     * @return \ApiBundle\Entity\Users
     */
    public function getSubjectUsers()
    {
        return $this->SubjectUsers;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $SubjectCoatchs;


    /**
     * Add subjectCoatch
     *
     * @param \ApiBundle\Entity\Subjects_coatch $subjectCoatch
     *
     * @return Subjects
     */
    public function addSubjectCoatch(\ApiBundle\Entity\Subjects_coatch $subjectCoatch)
    {
        $this->SubjectCoatchs[] = $subjectCoatch;

        return $this;
    }

    /**
     * Remove subjectCoatch
     *
     * @param \ApiBundle\Entity\Subjects_coatch $subjectCoatch
     */
    public function removeSubjectCoatch(\ApiBundle\Entity\Subjects_coatch $subjectCoatch)
    {
        $this->SubjectCoatchs->removeElement($subjectCoatch);
    }

    /**
     * Get subjectCoatchs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubjectCoatchs()
    {
        return $this->SubjectCoatchs;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $SubjectTokens;


    /**
     * Add subjectToken
     *
     * @param \ApiBundle\Entity\Subjects_coatch $subjectToken
     *
     * @return Subjects
     */
    public function addSubjectToken(\ApiBundle\Entity\Subjects_coatch $subjectToken)
    {
        $this->SubjectTokens[] = $subjectToken;

        return $this;
    }

    /**
     * Remove subjectToken
     *
     * @param \ApiBundle\Entity\Subjects_coatch $subjectToken
     */
    public function removeSubjectToken(\ApiBundle\Entity\Subjects_coatch $subjectToken)
    {
        $this->SubjectTokens->removeElement($subjectToken);
    }

    /**
     * Get subjectTokens
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubjectTokens()
    {
        return $this->SubjectTokens;
    }
}
