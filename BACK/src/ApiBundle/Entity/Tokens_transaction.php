<?php

namespace ApiBundle\Entity;

/**
 * Tokens_transaction
 */
class Tokens_transaction
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
     * @var integer
     */
    private $howmany;

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
     * Set howmany
     *
     * @param integer $howmany
     *
     * @return Tokens_transaction
     */
    public function setHowmany($howmany)
    {
        $this->howmany = $howmany;

        return $this;
    }

    /**
     * Get howmany
     *
     * @return integer
     */
    public function getHowmany()
    {
        return $this->howmany;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Tokens_transaction
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
     * @return Tokens_transaction
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
     * @return Tokens_transaction
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
     * @var \ApiBundle\Entity\Subjects
     */
    private $TokenSubjects;


    /**
     * Set tokenSubjects
     *
     * @param \ApiBundle\Entity\Subjects $tokenSubjects
     *
     * @return Tokens_transaction
     */
    public function setTokenSubjects(\ApiBundle\Entity\Subjects $tokenSubjects = null)
    {
        $this->TokenSubjects = $tokenSubjects;

        return $this;
    }

    /**
     * Get tokenSubjects
     *
     * @return \ApiBundle\Entity\Subjects
     */
    public function getTokenSubjects()
    {
        return $this->TokenSubjects;
    }
    /**
     * @var \ApiBundle\Entity\Team_details
     */
    private $TokenTeams;


    /**
     * Set tokenTeams
     *
     * @param \ApiBundle\Entity\Team_details $tokenTeams
     *
     * @return Tokens_transaction
     */
    public function setTokenTeams(\ApiBundle\Entity\Team_details $tokenTeams = null)
    {
        $this->TokenTeams = $tokenTeams;

        return $this;
    }

    /**
     * Get tokenTeams
     *
     * @return \ApiBundle\Entity\Team_details
     */
    public function getTokenTeams()
    {
        return $this->TokenTeams;
    }
    /**
     * @var \ApiBundle\Entity\Users
     */
    private $TransactionTokenCoatchUsers;


    /**
     * Set transactionTokenCoatchUsers
     *
     * @param \ApiBundle\Entity\Users $transactionTokenCoatchUsers
     *
     * @return Tokens_transaction
     */
    public function setTransactionTokenCoatchUsers(\ApiBundle\Entity\Users $transactionTokenCoatchUsers = null)
    {
        $this->TransactionTokenCoatchUsers = $transactionTokenCoatchUsers;

        return $this;
    }

    /**
     * Get transactionTokenCoatchUsers
     *
     * @return \ApiBundle\Entity\Users
     */
    public function getTransactionTokenCoatchUsers()
    {
        return $this->TransactionTokenCoatchUsers;
    }
}
