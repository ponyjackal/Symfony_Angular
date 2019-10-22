<?php

namespace ApiBundle\Entity;

/**
 * Subjects_team
 */
class Subjects_team
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
     * @var \ApiBundle\Entity\Team_details
     */
    private $SubjectTeam;


    /**
     * Set subjectTeam
     *
     * @param \ApiBundle\Entity\Team_details $subjectTeam
     *
     * @return Subjects_team
     */
    public function setSubjectTeam(\ApiBundle\Entity\Team_details $subjectTeam = null)
    {
        $this->SubjectTeam = $subjectTeam;

        return $this;
    }

    /**
     * Get subjectTeam
     *
     * @return \ApiBundle\Entity\Team_details
     */
    public function getSubjectTeam()
    {
        return $this->SubjectTeam;
    }
    /**
     * @var \ApiBundle\Entity\Subjects
     */
    private $TeamSubjectDetails;


    /**
     * Set teamSubjectDetails
     *
     * @param \ApiBundle\Entity\Subjects $teamSubjectDetails
     *
     * @return Subjects_team
     */
    public function setTeamSubjectDetails(\ApiBundle\Entity\Subjects $teamSubjectDetails = null)
    {
        $this->TeamSubjectDetails = $teamSubjectDetails;

        return $this;
    }

    /**
     * Get teamSubjectDetails
     *
     * @return \ApiBundle\Entity\Subjects
     */
    public function getTeamSubjectDetails()
    {
        return $this->TeamSubjectDetails;
    }
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
     * Set active
     *
     * @param boolean $active
     *
     * @return Subjects_team
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
     * @return Subjects_team
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
     * @return Subjects_team
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
}
