<?php
namespace Guikifix\Core\Domain;

/**
 * JobTypeCategory
 *
 * La clase representa un arbol con las 
 * posibles tipos de trabajos que pueden registrarse
 * en el sistema al momento de realizar una busqueda
 *
 * @author Freddy Contreras
 */
class JobTypeCategory
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
     * @var \Guikifix\Core\Domain\JobTypeCategory
     */
    private $parent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $jobs_types;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->jobs_types = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return JobTypeCategory
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
     * @return JobTypeCategory
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
     * @return JobTypeCategory
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
     * @return JobTypeCategory
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
     * @return JobTypeCategory
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
     * @return JobTypeCategory
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
     * @param \Guikifix\Core\Domain\JobTypeCategory $child
     *
     * @return JobTypeCategory
     */
    public function addChild(\Guikifix\Core\Domain\JobTypeCategory $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \Guikifix\Core\Domain\JobTypeCategory $child
     */
    public function removeChild(\Guikifix\Core\Domain\JobTypeCategory $child)
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
     * @param \Guikifix\Core\Domain\JobTypeCategory $parent
     *
     * @return JobTypeCategory
     */
    public function setParent(\Guikifix\Core\Domain\JobTypeCategory $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Guikifix\Core\Domain\JobTypeCategory
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add jobsType
     *
     * @param \Guikifix\Core\Domain\Job $jobsType
     *
     * @return JobTypeCategory
     */
    public function addJobsType(\Guikifix\Core\Domain\Job $jobsType)
    {
        $this->jobs_types[] = $jobsType;

        return $this;
    }

    /**
     * Remove jobsType
     *
     * @param \Guikifix\Core\Domain\Job $jobsType
     */
    public function removeJobsType(\Guikifix\Core\Domain\Job $jobsType)
    {
        $this->jobs_types->removeElement($jobsType);
    }

    /**
     * Get jobsTypes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJobsTypes()
    {
        return $this->jobs_types;
    }
}
