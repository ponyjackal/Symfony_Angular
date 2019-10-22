<?php

namespace ApiBundle\Entity;

/**
 * Subjects_coatch
 */
class Subjects_coatch
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
     * Set id
     *
     * @param integer $id
     *
     * @return Subjects_coatch
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Subjects_coatch
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
     * @return Subjects_coatch
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
     * @return Subjects_coatch
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
     * @var \ApiBundle\Entity\Users
     */
    private $CoatchUsers;

    /**
     * @var \ApiBundle\Entity\Subjects
     */
    private $CoatchSubjects;


    /**
     * Set coatchUsers
     *
     * @param \ApiBundle\Entity\Users $coatchUsers
     *
     * @return Subjects_coatch
     */
    public function setCoatchUsers(\ApiBundle\Entity\Users $coatchUsers = null)
    {
        $this->CoatchUsers = $coatchUsers;

        return $this;
    }

    /**
     * Get coatchUsers
     *
     * @return \ApiBundle\Entity\Users
     */
    public function getCoatchUsers()
    {
        return $this->CoatchUsers;
    }

    /**
     * Set coatchSubjects
     *
     * @param \ApiBundle\Entity\Subjects $coatchSubjects
     *
     * @return Subjects_coatch
     */
    public function setCoatchSubjects(\ApiBundle\Entity\Subjects $coatchSubjects = null)
    {
        $this->CoatchSubjects = $coatchSubjects;

        return $this;
    }

    /**
     * Get coatchSubjects
     *
     * @return \ApiBundle\Entity\Subjects
     */
    public function getCoatchSubjects()
    {
        return $this->CoatchSubjects;
    }
}
