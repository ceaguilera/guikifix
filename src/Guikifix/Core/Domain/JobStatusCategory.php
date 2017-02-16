<?php
namespace Guikifix\Core\Domain;

/**
 * JobStatusCategory
 *
 * Clase representa un arbol con los posibles
 * combinaciones de estados referente al trabajo a realizar
 * para una mayor especificación (imagen - USERC3)
 *
 * @author  Freddy Contreras
 * 
 */
class JobStatusCategory
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var boolean
     */
    private $notifications;

    /**
     * @var \DateTime
     */
    private $last_update;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * @var \Guikifix\Core\Domain\JobStatusCategory
     */
    private $parent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $jobs_status;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->jobs_status = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     *
     * @return JobStatusCategory
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return JobStatusCategory
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
     * Set status
     *
     * @param integer $status
     *
     * @return JobStatusCategory
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set notifications
     *
     * @param boolean $notifications
     *
     * @return JobStatusCategory
     */
    public function setNotifications($notifications)
    {
        $this->notifications = $notifications;

        return $this;
    }

    /**
     * Get notifications
     *
     * @return boolean
     */
    public function getNotifications()
    {
        return $this->notifications;
    }

    /**
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     *
     * @return JobStatusCategory
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
     * @return JobStatusCategory
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
     * Add child
     *
     * @param \Guikifix\Core\Domain\JobStatusCategory $child
     *
     * @return JobStatusCategory
     */
    public function addChild(\Guikifix\Core\Domain\JobStatusCategory $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \Guikifix\Core\Domain\JobStatusCategory $child
     */
    public function removeChild(\Guikifix\Core\Domain\JobStatusCategory $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param \Guikifix\Core\Domain\JobStatusCategory $parent
     *
     * @return JobStatusCategory
     */
    public function setParent(\Guikifix\Core\Domain\JobStatusCategory $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Guikifix\Core\Domain\JobStatusCategory
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add jobsStatus
     *
     * @param \Guikifix\Core\Domain\Job $jobsStatus
     *
     * @return JobStatusCategory
     */
    public function addJobsStatus(\Guikifix\Core\Domain\Job $jobsStatus)
    {
        $this->jobs_status[] = $jobsStatus;

        return $this;
    }

    /**
     * Remove jobsStatus
     *
     * @param \Guikifix\Core\Domain\Job $jobsStatus
     */
    public function removeJobsStatus(\Guikifix\Core\Domain\Job $jobsStatus)
    {
        $this->jobs_status->removeElement($jobsStatus);
    }

    /**
     * Get jobsStatus
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJobsStatus()
    {
        return $this->jobs_status;
    }
}
