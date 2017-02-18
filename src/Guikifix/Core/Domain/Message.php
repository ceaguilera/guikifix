<?php
namespace Guikifix\Core\Domain;

/**
 * Message
 *
 * Representa los mensajes que son enviados entre
 * los usuarios y los profesionales
 *
 * @author  Freddy Contreras
 */
class Message
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $comment;

    /**
     * @var \DateTime
     */
    private $last_update;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \Guikifix\ApiBundle\Entity\User
     */
    private $user;

    /**
     * @var \Guikifix\Core\Domain\Budget
     */
    private $budget;


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
     * Set comment
     *
     * @param \DateTime $comment
     *
     * @return Message
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return \DateTime
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     *
     * @return Message
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->last_update = $lastUpdate;

        return $this;
    }

    /**
     * Get lastUpdate
     *
     * @return \DateTime
     */
    public function getLastUpdate()
    {
        return $this->last_update;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Message
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set user
     *
     * @param \Guikifix\ApiBundle\Entity\User $user
     *
     * @return Message
     */
    public function setUser(\Guikifix\ApiBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Guikifix\ApiBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set budget
     *
     * @param \Guikifix\Core\Domain\Budget $budget
     *
     * @return Message
     */
    public function setBudget(\Guikifix\Core\Domain\Budget $budget = null)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return \Guikifix\Core\Domain\Budget
     */
    public function getBudget()
    {
        return $this->budget;
    }
}
